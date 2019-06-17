<?php
/**
 * Created by PhpStorm.
 * User: hugo2
 * Date: 6/2/2019
 * Time: 1:01 PM
 */

use Illuminate\Support\Facades\Auth;

trait CheckPermissionTrait
{
    public function checkPermission($permission, $guard = "admin")
    {
        if (!(auth()->guard($guard)->check()) || !(auth()->guard($guard)->user()->hasPermissionTo($permission)))
            return false;

        return true;
    }
}