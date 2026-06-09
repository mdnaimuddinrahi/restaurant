<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGroceryRequest extends FormRequest
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
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('groceries')->ignore($this->route('grocery')),
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('groceries')->ignore($this->route('grocery')),
            ],

            'grocery_category_id' => [
                'required',
                'integer',
                'exists:grocery_categories,id',
            ],

            'grocery_unit_id' => [
                'required',
                'integer',
                'exists:grocery_units,id',
            ],

            'sku' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('groceries')->ignore($this->route('grocery')),
            ],

            'barcode' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('groceries')->ignore($this->route('grocery')),
            ],

            'minimum_stock' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'reorder_quantity' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'purchase_price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'average_cost' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'is_active' => [
                'sometimes',
                'boolean',
            ],

            'image' => [
                'nullable',
                'string',
                'max:500',
            ],

            'description' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ];
    }
}
