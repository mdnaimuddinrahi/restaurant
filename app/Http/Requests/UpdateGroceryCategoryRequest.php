<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGroceryCategoryRequest extends FormRequest
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
        $grocery_category = $this->route('grocery_category');
        
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('grocery_categories', 'name')
                    ->ignore($grocery_category),
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('grocery_categories', 'slug')
                    ->ignore($grocery_category),
            ],

            'code' => [
                'nullable',
                'string',
                'max:50'
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
