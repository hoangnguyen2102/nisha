<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Admin\Tag;
use App\Http\Requests\TagRequest as StoreRequest;
use App\Http\Requests\TagRequest as UpdateRequest;
use CheckPermissionTrait;
use Illuminate\Support\Facades\Lang;

class TagController extends Controller
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
        if($this->checkPermission('list tag')) {
            return view('admin.basic.tag.list', [
                'data'  =>  Tag::allForIndex(),
                'pageTitle' => Lang::trans('label.List tag'),
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
        if($this->checkPermission('create tag')) {
            return view('admin.basic.tag.create', [
                'route' => route('tag.store'),
                'pageTitle' => Lang::trans('label.Create tag'),
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
        $data['name'] = $request->name;

        // Store data
        $result = Tag::createRecord($data);

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->checkPermission('edit tag')) {
            $result = Tag::find($id);

            if ($result) {
                return view('admin.basic.tag.edit', [
                    'data'  => $result,
                    'route' => route('tag.update', ['id' => $id]),
                    'pageTitle' => Lang::trans('label.Edit tag'),
                ]);
            }

            return redirect()->url('admin/tag');
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
        $data['name'] = $request->name;

        // Find & update data
        $result = Tag::updateRecord($data, $id);

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
        if($this->checkPermission('delete tag')) {
            $result = Tag::deleteRecord($id);

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
