<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Admin\SettingSystem;

class SettingComposer
{

    protected $setting = [];

    public function __construct(SettingSystem $setting)
    {
        $this->setting = SettingSystem::first();
    }

    //
    public function compose($view)
    {
        $view->with('setting', $this->setting);
    }
}