<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest as AdminProfileRequest;
use Illuminate\Support\Facades\Lang;

class AccountController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {

    }

    public function changePassword()
    {
        return view('admin.auth.change-password', [
            'id'    => auth()->id(),
            'route' => route('changePassword'),
            'pageTitle' =>  Lang::trans('label.Change password')
        ]);
    }

    public function postChangePassword(AdminPasswordRequest $request)
    {
        $data['password'] = Hash::make($request->password);

        // Find & update data
        $result = false;
        if (!is_null(auth()->id()))
            $result = Admin::updateRecord($data, auth()->id());

        $message = 'Success';
        if (!$result) {
            $message = 'Failed';
        }

        return redirect()->back()->with('message', $message);
    }

    public function changeProfile()
    {
        return view('admin.auth.change-profile', [
            'id'    => auth()->id(),
            'route' => route('changeProfile'),
            'pageTitle' =>  Lang::trans('label.Change profile')
        ]);
    }

    public function postChangeProfile(AdminProfileRequest $request)
    {
        $result = Admin::updateRecord($request->all(), auth()->user()->id);

        // Message for user
        $message = 'Success';
        if (!$result) {
            $message = 'Failed';
        }

        // Return back
        return redirect()->back()->with('message', $message);
    }
}
