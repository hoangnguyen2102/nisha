<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use LaravelLocalization;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('client.auth.login', [
            'route' =>  route('client.login'),
        ]);
    }

    public function login(Request $request)
    {
        // Validate
        $this->validate($request, [
            'email'	=> 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('client.dashboard');
        }

        // unsuccessful
        return redirect()->route('client.login')->withErrors(['message' => Lang::trans('label.Your email does not match any registered accounts.')]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        return $this->loggedOut($request) ?: redirect()->route('client.login.show');
    }
}
