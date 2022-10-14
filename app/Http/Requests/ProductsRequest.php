<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'description' => 'required',
            'section_name' => 'required',
            'product_name' => 'required',

        ];
    }
    public function messages()
    {
        return[
        'section_name.required' =>'يرجي ادخال اسم القسم',
        'product_name.required' =>'يرجي ادخال  المنتج',
        'description.required' =>'يرجي ادخال  البيان',
       
        ];
    }
}
