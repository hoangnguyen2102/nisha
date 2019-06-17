<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Admin\Voucher;
use App\Http\Requests\VoucherRequest as StoreRequest;
use App\Http\Requests\VoucherRequest as UpdateRequest;
use CheckPermissionTrait;
use Illuminate\Support\Facades\Lang;

class VoucherController extends Controller
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
        if($this->checkPermission('list voucher'))
            return view('admin.basic.voucher.list', [
                'data'  =>  Voucher::allForIndex(),
                'pageTitle' => Lang::trans('label.List voucher'),
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
        if($this->checkPermission('create voucher'))
            return view('admin.basic.voucher.create', [
                'route' => route('voucher.store'),
                'pageTitle' => Lang::trans('label.List voucher'),
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
        $data['code']       = $request->code;
        $data['contents']   = $request->contents;
        $data['start']      = $request->start;
        $data['end']        = $request->end;

        // Store data
        $result = Voucher::createRecord($data);

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
        if($this->checkPermission('edit voucher')) {
            $result = Voucher::find($id);

            if ($result) {
                return view('admin.basic.voucher.edit', [
                    'data'  => $result,
                    'route' => route('voucher.update', ['id' => $id]),
                    'pageTitle' => Lang::trans('label.List voucher'),
                ]);
            }

            return redirect()->url('admin/voucher');
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
        $data['code']       = $request->code;
        $data['contents']   = $request->contents;
        $data['start']      = $request->start;
        $data['end']        = $request->end;

        // Find & update data
        $result = Voucher::updateRecord($data, $id);

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
        if($this->checkPermission('delete voucher')) {
            $result = Voucher::deleteRecord($id);

            $message = 'Success';

            if (!$result) {
                $message = 'Failed';
            }

            return redirect()->back();
        }
        else
            return redirect()->route(config('detail.route.admin'));

    }
}
