<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use App\Http\Requests\SliderRequest as StoreRequest;
use App\Http\Requests\SliderRequest as UpdateRequest;
use CheckPermissionTrait;
use Illuminate\Support\Facades\Lang;

class SliderController extends Controller
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
        if($this->checkPermission('list slider')) {
            return view('admin.basic.slider.list', [
                'data'  =>  Slider::allForIndex(),
                'pageTitle' => Lang::trans('label.List slider'),
            ]);
        }
        else
            return redirect()->route(config('detail.route.admin'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->checkPermission('create slider')) {
            return view('admin.basic.slider.create', [
                'route' => route('slider.store'),
                'pageTitle' => Lang::trans('label.List slider'),
            ]);
        }
        else
            return redirect()->route(config('detail.route.admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // Format data for store
        $data['link']       = $request->link;
        $data['path_image'] = $request->image;

        // Store data
        $result = Slider::createRecord($data);

        // Message for user
        $message = 'Success';
        if (!$result) {
            $message = 'Failed';
        }

        // Return back
        return redirect()->back()->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->checkPermission('edit slider')) {
            $result = Slider::find($id);

            if ($result) {
                return view('admin.basic.slider.edit', [
                    'data'  => $result,
                    'route' => route('slider.update', ['id' => $id]),
                    'pageTitle' => Lang::trans('label.List slider'),
                ]);
            }

            return redirect()->url('admin/slider');
        }
        else
            return redirect()->route(config('detail.route.admin'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        // Format data for update
        $data['path_image']     = $request->image;
        $data['link']           = $request->link;

        // Find & update data
        $result = Slider::updateRecord($data, $id);

        $message = 'Success';
        if (!$result) {
            $message = 'Failed';
        }

        return redirect()->back()->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->checkPermission('delete slider')) {
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
}
