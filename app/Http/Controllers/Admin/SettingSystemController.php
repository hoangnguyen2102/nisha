<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingSystemRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\SettingSystem;
use App\Http\Requests\SettingSystemRequest as UpdateRequest;
use CheckPermissionTrait;
use Illuminate\Support\Facades\Lang;

class SettingSystemController extends Controller
{
    use CheckPermissionTrait;
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function edit()
    {
        if($this->checkPermission('setting')) {
            $result = false;
            if (count(SettingSystem::get()) != 0) {
                $result = SettingSystem::first();
            } else {
                $result = new SettingSystem();

                //Create structor services data
                $result->services = $this->structorServices();

                $result->save();
            }

            return view('admin.basic.setting.edit', [
                'data'      => $result,
                'route'     => route('setting.update', ['id' => $result->id]),
                'pageTitle' =>  Lang::trans('label.Setting'),
            ]);
        }
        else
            return redirect()->route(config('detail.route.admin'));
    }

    public function update(UpdateRequest $request, $id)
    {

        $result = SettingSystem::updateRecord($request->all(), $id);

        $message = 'Success';

        if (!$result) {
            $message = 'Failed';
        }

        return redirect()->back()->with('message', $message);
    }

    public function structorServices()
    {
        $result = false;

        $result['one']['path_image']    =   'none';
        $result['one']['title']         =   'none';

        $result['two']['path_image']    =   'none';
        $result['two']['title']         =   'none';

        $result['three']['path_image']  =   'none';
        $result['three']['title']       =   'none';

        $result['four']['path_image']   =   'none';
        $result['four']['title']        =   'none';

        $result['five']['path_image']   =   'none';
        $result['five']['title']        =   'none';

        $result['six']['path_image']    =   'none';
        $result['six']['title']         =   'none';


        return json_encode($result);
    }

}
