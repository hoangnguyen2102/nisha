<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contract;
use App\Models\Admin\Request;
use Illuminate\Support\Facades\Lang;
use CheckPermissionTrait;

class ContractController extends Controller
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
        if($this->checkPermission('list contract')) {
            return view('admin.basic.contract.list', [
                'data'  =>  Contract::allForIndex(),
                'pageTitle' =>  Lang::trans('label.List contract'),
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
        if($this->checkPermission('show contract')) {
            return view('admin.basic.contract.show', [
                'data'   =>  Contract::find($id),
                'pageTitle' =>  Lang::trans('label.Show contract'),
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
        if($this->checkPermission('delete contract')) {
            $result = Contract::deleteRecord($id);

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
            $result = Contract::confirmContract($id);

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
