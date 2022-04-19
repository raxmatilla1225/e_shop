<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=> [
                'required',
                'max:255',
                'string'
            ],
            'description'=> [
                'required',
                'max:1000',
                'string'
            ],
            'news_category_id'=> [
                'required',
            ],
            'author_id'=> [
                'required',
            ],
            'views_count'=> [
                'required',
                'integer'
            ],
            'status'=> [
                'required',
            ],
            'meta_keys'=> [
                'required',
                'min:3',
                'max:255',
                'string'
            ],
            'meta_description'=> [
                'required',
                'max:1000',
                'string'
            ],
            'image'=> [
                'required',
                'max:20000',
                'mimes:jpg,png,jpeg',
            ],
        ];
    }
}
