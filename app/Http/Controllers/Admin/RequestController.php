<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Request as ModelRequest;
use App\Http\Requests\SliderRequest as StoreRequest;
use App\Http\Requests\SliderRequest as UpdateRequest;
use App\Models\Admin\Request;
use CheckPermissionTrait;
use Illuminate\Support\Facades\Lang;

class RequestController extends Controller
{
    use CheckPermissionTrait;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->checkPermission('list request')) {
            return view('admin.basic.request.list', [
                'data'  =>  ModelRequest::allForIndex(),
                'pageTitle' =>  Lang::trans('label.List request')
            ]);
        }
        else
            return redirect()->route(config('detail.route.admin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->checkPermission('show request')) {
            return view('admin.basic.request.show', [
                'data'   =>  ModelRequest::find($id),
                'pageTitle' =>  Lang::trans('label.Show request')
            ]);
        }
        else
            return redirect()->route(config('detail.route.admin'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->checkPermission('delete request')) {
            $result = Slider::deleteRecord($id);

            $message = 'Success';

            if (!$result) {
                $message = 'Failed';
            }

            return redirect()->back()->with('message', $message);
        }
        else
            return redirect()->route(config('detail.route.admin'));

    }

    /*
     *
     */
    public function confirm(Request $request, $id)
    {
        if($this->checkPermission('confirm request')) {
            $result = ModelRequest::confirmRequest($id);

            $message = 'Success';

            if (!$result) {
                $message = 'Failed';
            }

            return redirect()->back()->with('message', $message);
        }
        else
            return redirect()->route(config('detail.route.admin'));

    }
}
