<?php

namespace App\Http\Requests;


class AdminPasswordRequest extends BaseRequest
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
            'password'      => 'required|min:1|max:60',
            're-password'   => 'required|min:1|max:60|same:password',
        ];
    }
}
