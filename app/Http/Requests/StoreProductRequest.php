<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name_ru'=> [
                'min:3',
                'max:255',
                'string'
            ],
            'name_en'=> [
                'min:3',
                'max:255',
                'string'
            ],
            'name_uz'=> [
                'required',
                'min:3',
                'max:255',
                'string'
            ],
            'short_desc_ru'=> [
                'min:3',
                'max:255',
                'string'
            ],
            'short_desc_en'=> [
                'min:3',
                'max:255',
                'string'
            ],
            'short_desc_uz'=> [
                'required',
                'min:3',
                'max:255',
                'string'
            ],
            'desc_ru'=> [
                'min:3',
                'max:2000',
                'string'
            ],
            'desc_en'=> [
                'min:3',
                'max:2000',
                'string'
            ],
            'desc_uz'=> [
                'required',
                'min:3',
                'max:2000',
                'string'
            ],
            'price'=> [
                'required',
                'integer'
            ],
            'old_price'=> [
                'required',
                'integer'
            ],
            'discount'=> [
                'required',
                'integer'
            ],
            'status_id'=> [
                'required',
//                'exists:statuses,id'
            ],
            'category_id'=> [
                'required',
//                'exists:categories,id'
            ],
            'order'=> [
                'required',
                'integer'
            ],
            'slug'=> [
                'required',
                'string'
            ],
            'main_img'=> [
                'required',
                'max:20000',
                'mimes:jpg,png,jpeg',
            ],
            'images' => [
                'array'
            ],
            'images.*' => [
                'image'
            ],
            'brand_id'=> [
                'required',
//                'exists:brands,id'
            ],
            'quantity'=> [
                'required',
                'integer'
            ],
            'delivery_days'=> [
                'required',
            ],
        ];
    }
}






