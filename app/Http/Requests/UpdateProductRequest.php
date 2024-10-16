<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;  // Change to proper authorization logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        $rules = [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048',
            'unit_id' => 'required|exists:product_units,id',
            'slug' => ['required','string',Rule::unique('products', 'slug')->ignore($this->product)]
        ];

        // If the product has variations, add variation validation rules
        if ($this->has('is_variation_product')) {
            $rules = array_merge($rules, [
                'variations.*.name' => 'required|string|max:255',
                'variations.*.price' => 'required|numeric|min:0',
                'variations.*.stock' => 'required|integer|min:0',
            ]);
        }

        return $rules;
    }

    /**
     * Custom error messages for validation.
     */
    public function messages()
    {
        return [
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'Selected category does not exist.',
            'name.required' => 'Product name is required.',
            'short_description.required' => 'Short description is required.',
            'short_description.max' => 'Short description must not greater than 255 characters',
            'description.required' => 'Product description is required.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a valid number.',
            'images.*.image' => 'Uploaded file must be an image.',
            'images.*.mimes' => 'Image must be a file of type: jpeg, png,webp, jpg, gif, svg.',
            'unit_id.required' => 'Please select a product unit.',
            'unit_id.exists' => 'Selected unit does not exist.',
            'variations.*.name.required' => 'Variation name is required.',
            'slug.unique' => 'The slug has already been taken. Please choose a different one.',
            'slug.required' => 'The slug field is required.',
        ];
    }
}
