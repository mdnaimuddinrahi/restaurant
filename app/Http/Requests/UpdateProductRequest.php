<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product');

        return [

            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products','name')
                    ->ignore($productId)
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products','slug')
                    ->ignore($productId)
            ],

            'image' => [
                'nullable',
                'string',
                'max:500'
            ],

            'price' => [
                'required',
                'numeric',
                'min:0'
            ],

            'variety_id' => [
                'nullable',
                'integer',
                'exists:product_varieties,id'
            ],

            'category_id' => [
                'nullable',
                'integer',
                'exists:product_categories,id'
            ],

            'announcement_id' => [
                'nullable',
                'integer',
                'exists:product_announcements,id'
            ],

            'is_available' => [
                'required',
                'boolean'
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'sku' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('products','sku')
                    ->ignore($productId)
            ]
        ];
    }
}
