<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Http\Requests\AdminRequest as StoreRequest;
use App\Http\Requests\AdminRequest as UpdateRequest;
use App\Http\Requests\AdminPasswordRequest;
use Illuminate\Support\Facades\Lang;
use CheckPermissionTrait;

class AdminController extends Controller
{
    use CheckPermissionTrait;

    protected $password = 'password';

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
        if ($this->checkPermission('list employee')) {
            return view('admin.basic.employee.list', [
                'data' => Admin::allForIndex(),
                'pageTitle' => Lang::trans('label.List employee'),
            ]);//
        } else
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
        if ($this->checkPermission('create employee'))
            return view('admin.basic.employee.create', [
                'route' => route('employee.store'),
                'pageTitle' => Lang::trans('label.Create employee'),
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
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = Hash::make($this->password);

        // Store data
        $result = Admin::createRecord($data);

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
        if ($this->checkPermission('edit article')) {
            $result = Admin::find($id);

            if ($result) {
                if ($result->deleted == 1 || !$result->hasVerifiedEmail()) {
                    return redirect()->to('admin/employee');
                }

                return view('admin.basic.employee.edit', [
                    'data' => $result,
                    'route' => route('employee.update', ['id' => $id]),
                    'pageTitle' => Lang::trans('label.Edit employee'),
                ]);
            }

            return redirect()->to('admin/employee');
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
        // Format data for store
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;

        if ($request->image)
            $data['image'] = $request->image;

        // Find & update data
        $result = Admin::updateRecord($data, $id);

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
        if ($this->checkPermission('delete article')) {

            $result = Admin::deleteRecord($id);

            $message = 'Success';

            if (!$result) {
                $message = 'Failed';
            }

            return redirect()->back()->with('message', $message);
        } else
            return redirect()->route(config('detail.route.admin'));

    }

    public function getOne(Request $request)
    {
        return $request->id;
    }
}