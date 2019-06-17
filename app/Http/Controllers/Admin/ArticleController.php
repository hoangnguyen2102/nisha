<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Admin\Article;
use App\Http\Requests\ArticleRequest as StoreRequest;
use App\Http\Requests\ArticleRequest as UpdateRequest;
use CheckPermissionTrait;
use Illuminate\Support\Facades\Lang;

class ArticleController extends Controller
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
        if($this->checkPermission('list article'))
            return view('admin.basic.article.list', [
                'data'  =>  Article::allForIndex(),
                'pageTitle' =>  Lang::trans('label.List article'),
            ]);
        else
            return redirect()->route(config('detail.route.admin'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->checkPermission('create article'))
            return view('admin.basic.article.create', [
                'route' => route('article.store'),
                'pageTitle' =>  Lang::trans('label.Create article'),
            ]);
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
        $data['title']      = $request->title;
        $data['description']    = $request->description;
        $data['contents']   = $request->get('content');
        $data['tag']        = $request->tag;
        $data['image']      = $request->image;

        // Store data
        $result = Article::createRecord($data);

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
        if($this->checkPermission('edit article')) {

            $result = Article::find($id);

            if ($result) {
                return view('admin.basic.article.edit', [
                    'data'  => $result,
                    'route' => route('article.update', ['id' => $id]),
                    'pageTitle' =>  Lang::trans('label.Edit article'),
                ]);
            }

            return redirect()->url('admin/article');
        } else
            return redirect()->route(config('detail.route.admin'));
        //
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
        $data['title']      = $request->title;
        $data['description']    = $request->description;
        $data['contents']   = $request->get('content');
        $data['tag']        = $request->tag;
        if ($request->has('image')) {
            $data['image']      = $request->image;
        }

        // Find & update data
        $result = Article::updateRecord($data, $id);
        unset($data);

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
        if($this->checkPermission('delete article')) {

            $result = Article::deleteRecord($id);

            $message = 'Success';

            if (!$result) {
                $message = 'Failed';
            }

            return redirect()->back()->with('message', $message);
        } else
            return redirect()->route(config('detail.route.admin'));
    }
}
