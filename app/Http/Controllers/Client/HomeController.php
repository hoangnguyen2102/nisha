<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\SettingSystem;
use App\Models\Admin\Article;
use App\Models\Admin\Admin;
use App\Models\Admin\Slider;
use Illuminate\Support\Facades\Lang;

class HomeController extends Controller
{
    //
    public function index()
    {
        // GET IMAGE

        // GET PT

        // GET BLOG

        // GET VOUCHER

        return view('client.basic.home', [
            'serviceImages'         =>  $this->getImageService(),
            'employees'             =>  $this->getEmployee(),
            'articles'              =>  $this->getArticle(),
            'vouchers'              =>  $this->getVoucher(),
            'sliders'               =>  $this->getSlider(),
        ]);
    }

    public function getImageService()
    {
        return SettingSystem::getServiceImageForHome();
    }

    public function getEmployee()
    {
        return Admin::getEmployeeForHome();
    }

    public function getArticle()
    {
        return Article::getArticleForHome();
    }

    public function getVoucher()
    {

    }

    public function getSlider()
    {
        return Slider::getSliderForHome();
    }
}
