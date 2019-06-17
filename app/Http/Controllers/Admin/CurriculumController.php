<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Curriculum;
use App\Http\Requests\CurriculumRequest as StoreRequest;
use App\Http\Requests\CurriculumRequest as UpdateRequest;
use CheckPermissionTrait;
use Illuminate\Support\Facades\Lang;

class CurriculumController extends Controller
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
        if ($this->checkPermission('list curriculum'))
            return view('admin.basic.curriculum.list', [
                'data' => Curriculum::allForIndex(),
                'pageTitle' => Lang::trans('label.List curriculum'),
            ]);


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
        if ($this->checkPermission('create curriculum'))
            return view('admin.basic.curriculum.create', [
                'route' => route('curriculum.store'),
                'pageTitle' => Lang::trans('label.List curriculum'),
            ]);
        else
            return redirect()->route(config('detail.route.admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // Format data for store
        $data['title'] = $request->title;
        $data['contents'] = $request->contents;
        $data['number'] = $request->number;
        $data['image'] = $request->image;
        $data['price'] = $request->price;

        // Store data
        $result = Curriculum::createRecord($data);

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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($this->checkPermission('edit curriculum')) {
            $result = Curriculum::find($id);

            if ($result) {
                if ($result->deleted == 1) {
                    return redirect()->to('admin/curriculum');
                }

                return view('admin.basic.employee.edit', [
                    'data' => $result,
                    'route' => route('employee.update', ['id' => $id]),
                    'pageTitle' => Lang::trans('label.Edit employee'),
                ]);
            }
            return redirect()->url('admin/curriculums');
        } else
            return redirect()->route(config('detail.route.admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        // Format data for update
        $data['title'] = $request->title;
        $data['contents'] = $request->contents;
        $data['number'] = $request->number;
        $data['image'] = $request->image;
        $data['price'] = $request->price;

        // Find & update data
        $result = Curriculum::updateRecord($data, $id);

        $message = 'Success';
        if (!$result) {
            $message = 'Failed';
        }

        return redirect()->back()->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->checkPermission('delete curriculum')) {
            $result = Curriculum::deleteRecord($id);

            $message = 'Success';

            if (!$result) {
                $message = 'Failed';
            }

            return redirect()->back()->with('message', $message);
        } else
            return redirect()->route(config('detail.route.admin'));
    }


}
