<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'int|exists:categories,id',
            'name' => 'max:100',
            'description' => 'max:255',
            'price' => 'numeric',
        ];
    }
}
