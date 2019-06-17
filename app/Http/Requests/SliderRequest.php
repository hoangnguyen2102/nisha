<?php

namespace App\Http\Requests;

class SliderRequest extends BaseRequest
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
                'link'  => 'required',
                'image' => 'image|max:2048',
            ];
        }

        return [
            'link'  => 'required',
            'image' => 'required|max:2048',
        ];
    }
}
