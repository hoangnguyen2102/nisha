<?php

namespace App\Http\Requests;


class ArticleRequest extends BaseRequest
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
                'title'     => 'required|min:1|max:120',
                'description'   =>  'required|min:1|max:1024',
                'content'   => 'required',
                'image'     => 'max:2048',
                'tag'       => 'required',
            ];
        }

        return [
            //
            'title'     => 'required|min:1|max:120',
            'description'   =>  'required|min:1|max:1024',
            'content'   => 'required',
            'image'     => 'required|max:2048',
            'tag'       => 'required',
        ];
    }
}
