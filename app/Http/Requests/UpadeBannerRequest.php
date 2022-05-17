<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpadeBannerRequest extends FormRequest
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
            'title' => [
                'nullable',
                'string',
                'required',
                'max:255'
            ],
            'description' => [
                'required',
                'string',
                'required',
                'max:255'
            ],
            'price' => [
                'required',
                'string',
                'min:1',
                'max:7'
            ],
            'image' => [
                'required',
                'max:20000',
                'mimes:jpg,png,jpeg',
            ],
        ];
    }
}
