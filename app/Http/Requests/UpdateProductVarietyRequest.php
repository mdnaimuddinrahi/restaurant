<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductVarietyRequest extends FormRequest
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
        $varietyId = $this->route('product_variety');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_varieties', 'name')
                    ->ignore($varietyId),
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_varieties', 'slug')
                    ->ignore($varietyId),
            ],

            'category_id' => [
                'nullable',
                'integer',
                'exists:product_categories,id',
            ],

            'status' => [
                'required',
                Rule::in([0, 1]),
            ],

            'image' => [
                'nullable',
                'string',
                'max:500',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ];
    }
}
