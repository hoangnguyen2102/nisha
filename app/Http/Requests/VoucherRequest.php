<?php

namespace App\Http\Requests;

class VoucherRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code'      =>  'required|min:1|max:24|unique:vouchers',
            'contents'  =>  'required',
            'start'     =>  'required|date|after_or_equal:now',
            'end'       =>  'required|date|after_or_equal:start',
        ];
    }
}
