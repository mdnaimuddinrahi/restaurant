<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreGroceryCategoryRequest extends FormRequest
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
                'unique:grocery_categories,name',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:grocery_categories,slug',
            ],

            'code' => [
                'nullable',
                'string',
                'max:50',
                'unique:grocery_categories,code',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'is_active' => [
                'sometimes',
                'boolean',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'image' => [
                'nullable',
                'string',
                'max:500',
            ],
        ];
    }
}
