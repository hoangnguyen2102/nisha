<?php

namespace App\Http\Requests;

class SettingSystemRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logo'              =>  'image|max:4096',
            'email'             =>  'min:0|max:254',
            'phone'             =>  'min:0|max:20',
            'address'           =>  'min:0|max:254',
            'facebook'          =>  'min:0|max:254',
            'youtube'           =>  'min:0|max:254',
            'twitter'           =>  'min:0|max:254',
            'service_one'       =>  'image|max:2048',
            'service_two'       =>  'image|max:2048',
            'service_three'     =>  'image|max:2048',
            'service_four'      =>  'image|max:2048',
            'service_five'      =>  'image|max:2048'
        ];
    }
}
