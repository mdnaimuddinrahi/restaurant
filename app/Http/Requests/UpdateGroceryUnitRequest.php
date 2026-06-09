<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGroceryUnitRequest extends FormRequest
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
        $grocery_unit = $this->route('grocery_unit');
        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('grocery_units', 'name')
                    ->ignore($grocery_unit),
            ],

            'short_name' => [
                'required',
                'string',
                'max:20',
                Rule::unique('grocery_units', 'short_name')
                    ->ignore($grocery_unit),
            ],

            'code' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique('grocery_units', 'code')
                    ->ignore($grocery_unit),
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'is_active' => [
                'sometimes',
                'boolean',
            ],

        ];
    }
}
