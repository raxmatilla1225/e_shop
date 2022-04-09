<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
                'min:10',
                'max:255',
                'string'
            ],
            'description'=> [
                'required',
                'max:1000',
                'text'
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
                'max:255',
                'string'
            ],
            'meta_description'=> [
                'required',
                'max:1000',
                'text'
            ],
            'image'=> [
                'required',
                'max:15',
                'mimes:jpg,png,jpeg',
            ],
        ];
    }
}
