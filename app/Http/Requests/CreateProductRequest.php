<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|int|exists:categories,id',
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
        ];
    }
}
