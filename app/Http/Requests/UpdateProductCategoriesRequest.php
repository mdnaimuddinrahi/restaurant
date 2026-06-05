<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductCategoriesRequest extends FormRequest
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
        $productCategoryId = $this->route('product_category');

        return [
            'name' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('product_categories', 'name')->ignore($productCategoryId),
            ],
            'slug' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('product_categories', 'slug')->ignore($productCategoryId),
            ],
            'status' => [
                'sometimes',
                'integer',
                'between:0,1',
            ],
            'image' => [
                'nullable',
                'string',
                'max:255',
            ],
            'description' => [
                'nullable',
                'string',
            ],
        ];
    }
}
