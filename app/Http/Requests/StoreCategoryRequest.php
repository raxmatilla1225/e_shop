<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'title_uz' => [
                'string',
                'required',
                'max:255'
            ],
            'title_ru' => [
                'string',
                'max:255',
                'nullable',
                'required'
            ],
            'title_en' => [
                'string',
                'max:255',
                'nullable'
            ] ,
            'description_uz' => [
                'string',
                'required',
                'max:255'
            ],
            'description_ru' => [
                'string',
                'max:255',
                'nullable',
                'required'
            ],
            'description_en' => [
                'string',
                'max:255',
                'nullable'
            ],
            'status' => [
                'nullable'
            ],
            'image' => [
                'nullable',
                'mimes:jpg,png,jpeg,gif,svg',
            ],
            'icon' => [
                'string',
                'max:255',
                'nullable',
            ],
            'parent_id' => [
             'nullable',
                'numeric'] ,
            'order' => [
                'nullable',
                'numeric'
            ]
        ];
    }
}
