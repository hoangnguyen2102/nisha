<?php

namespace App\Http\Requests;

class FeedBackRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  =>  'required|min:0|max:254',
            'phone' =>  'required|min:0|max:20',
            'email' =>  'required|min:0|max:254',
            'message'   =>  'required|min:0|max:2000',
        ];
    }
}
