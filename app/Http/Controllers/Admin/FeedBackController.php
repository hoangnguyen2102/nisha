<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\FeedBack;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use CheckPermissionTrait;

class FeedBackController extends Controller
{
    use CheckPermissionTrait;

    public function __construct()
    {
//        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->checkPermission('list feedback')) {
            return view('admin.basic.feedback.list', [
                'data'  =>  FeedBack::allForIndex(),
                'pageTitle' => Lang::trans('label.List feedback'),
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->checkPermission('show feedback')) {
            return view('admin.basic.feedback.show', [
                'data'   => FeedBack::find($id),
                'pageTitle' => Lang::trans('label.List feedback'),
            ]);
        }
        else
            return redirect()->route(config('detail.route.admin'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function apiGet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'    =>  'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'message' => 'Failed']);
        }

        //
        $result = Feedback::find($request->id);

        if (!is_null($result)) {
            return response()->json(['status' => 200, 'data' => $result]);
        }

        return response()->json(['status' => 404, 'data' => 'Cannot found item']);
    }
}
