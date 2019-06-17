<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use App\Models\Admin\User;
use App\Models\Admin\Request;
use App\Models\Admin\Contract;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.verified');
        $this->middleware('auth:admin');
    }

    //
    public function index()
    {
        return view('admin.basic.home', [
            'pageTitle' =>  Lang::trans('label.Home'),
            'registerAccount' =>  $this->countUser(),
            'registerTrain' =>  $this->countRegisterTrain(),
            'registerPT'    =>  $this->countRegisterPT(),
            'registerPTNotConfirm' => $this->countRegisterPTNotConfirm()
        ]);
    }

    public function countUser()
    {
        return User::all()->count();
    }

    public function countRegisterTrain()
    {
        return Request::all()->count();
    }

    public function countRegisterPT()
    {
        return Contract::all()->count();
    }

    public function countRegisterPTNotConfirm()
    {
        return Contract::allNotConfirm()->count();
    }
}
