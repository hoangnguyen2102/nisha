<?php

namespace App\Http\Requests;


class AdminProfileRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'address'   => 'required|min:1|max:254',
            'name'      =>  'required|min:1|max:80',
            'job'       =>  'required|min:1|max:254',
            'description'   =>  'required|min:1|max:3000',
            'phone'     =>  'required|min:7:max:20',
            'image'     => 'max:2048',
        ];
    }
}
