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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'category_id' => 'integer|exists:categories,id',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'category_id.exists' => 'You must choose a valid category',
        ];
    }
}
