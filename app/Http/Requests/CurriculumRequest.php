<?php

namespace App\Http\Requests;

class CurriculumRequest extends BaseRequest
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
                'title'  => 'required|max:200',
                'contents'  => 'required|max:6000',
                'number'    =>  'required|numeric',
                'image' => 'image|max:512',
                'num.*'   =>  'required',
                'price' =>  'required|numeric'
            ];
        }

        return [
            'title'  => 'required|max:200',
            'contents'  => 'required|max:6000',
            'number'    =>  'required|numeric',
            'image' => 'required|image|max:512',
            'num.*'   =>  'required',
            'price' =>  'required|numeric'
        ];
    }
}
