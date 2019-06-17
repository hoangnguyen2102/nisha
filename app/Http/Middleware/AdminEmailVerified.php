<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class AdminEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (! $request->user() ||
            ($request->user() instanceof MustVerifyEmail &&
                ! $request->user()->hasVerifiedEmail())) {

            if ($request->expectsJson()) {
                return abort(403, 'Your email address is not verified.');
            }

            if(auth()->guard('admin')->check()) {
                $redirect = 'admin.verification.notice';
            }

            return Redirect::route($redirectToRoute ?: $redirect);

//            return $request->expectsJson()
//                    ? abort(403, 'Your email address is not verified.')
//                    : Redirect::route($redirectToRoute ?: 'verification.notice');
        }

        return $next($request);
    }
}
