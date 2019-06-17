<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Contract;
use App\Models\Admin\Request as MRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Lang;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listContract()
    {
        return view('admin.basic.customer.list-contract', [
            'data' =>  Contract::distinct('user_id')->get(['user_id', 'admin_id', 'phone', 'email']),
            'pageTitle' =>  Lang::trans('label.Customer contract')
        ]);
    }

    public function listRequest()
    {
        return view('admin.basic.customer.list-request', [
            'data' =>  MRequest::distinct('user_id')->get(['user_id', 'phone', 'email']),
            'pageTitle' =>  Lang::trans('label.Customer request')
        ]);
    }

    public function listUser()
    {
        return view('admin.basic.customer.list-user', [
            'data' =>  User::all(),
            'pageTitle' =>  Lang::trans('label.Customer user')
        ]);
    }
}
