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
                'nullable',
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
                'nullable',
                'string',
                'max:255'
            ],
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
                'nullable',
                'string',
                'max:255',
            ],
            'status' => [
                'nullable',
                'boolean'
            ],
            'image' => [
                'nullable',
                'mimes:jpg,png,jpeg,gif,svg',
            ],
            'icon' => [
                'nullable',
                'string',
                'max:255'
            ],
            'parent_id' => [
                'nullable',
                'numeric'],
            'order' => [
                'nullable',
                'numeric'
            ]
        ];
    }
}
