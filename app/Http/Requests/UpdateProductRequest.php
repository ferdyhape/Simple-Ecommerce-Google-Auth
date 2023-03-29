<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'sum' => 'required|integer',
            'description' => 'nullable|string',
            'category_id' => 'integer|exists:categories,id',
        ];
    }
    public function messages()
    {
        return [
            'category_id.exists' => 'You must choose a valid category',
        ];
    }
}
