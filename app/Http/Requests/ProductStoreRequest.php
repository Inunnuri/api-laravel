<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'type_id' => 'nullable|exists:types,id',
            'status_id' => 'nullable|exists:statuses,id',
            'year' => 'required|string|max:4',
            'description' => 'required|string',
            'price' => 'required|string',
            'location' => 'required|string',
            'product_photo' => 'required|image|mimes:jpg,jpeg,png|max:4000',
        ];
    }
}
