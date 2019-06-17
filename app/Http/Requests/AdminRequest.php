<?php

namespace App\Http\Requests;


class AdminRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->method() == 'PUT') {
            return [
                //
                'name'      => 'required|min:1|max:60',
                'phone'     => 'required|min:8|max:11',
                'password'  => 'min:6|max:40',
            ];
        }

        return [
            //
            'name'      => 'required|min:1|max:60',
            'email'     => 'required|email|unique:admins,email',
            'phone'     => 'required|min:8|max:11',
        ];
    }
}
