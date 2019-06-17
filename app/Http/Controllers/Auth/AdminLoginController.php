<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    use AuthenticatesUsers;

    public function __construct()
    {
    	$this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
    	return view('admin.auth.login');
    }

    public function login(Request $request)
    {
       	// Validate
    	$this->validate($request, [
    		'email'	=> 'required|email',
    		'password' => 'required|min:6',
    	]);

    	// Attempt
    	if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    		return redirect()->intended(route('admin.dashboard'));
    	}

    	// unsuccessful
    	return redirect()->back();
    }

    public function logout(Request $request)
    {
    	Auth::guard('admin')->logout();

        return $this->loggedOut($request) ?: redirect('/admin/login');
    }
}
