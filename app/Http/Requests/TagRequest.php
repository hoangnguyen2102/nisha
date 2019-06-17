<?php

namespace App\Http\Requests;

class TagRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  =>  'required|min:1|max:24|unique:tags,name',
        ];
    }
}
