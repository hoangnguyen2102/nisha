<?php

namespace App\Http\Controllers\Client;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalTrainerController extends Controller
{
    //
    public function index()
    {
        return view('client.basic.personal-trainer', [
            'data'  =>  Admin::getEmployeeForHome()
        ]);
    }

    public function getBySlug($slug)
    {
        return view('client.basic.single-personal-trainer', [
            'data'  =>  Admin::findBySlug($slug),
        ]);
    }
}
