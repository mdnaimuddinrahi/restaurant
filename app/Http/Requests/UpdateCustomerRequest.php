<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
            ],

            'email' => [
                'nullable',
                'email:rfc,dns',
                'max:255',
                Rule::unique('customers', 'email')
                    ->ignore($this->route('customer')),
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('customers', 'phone')
                    ->ignore($this->route('customer')),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'max:255',
            ],

            'verified_at' => [
                'nullable',
                'date',
            ],

            'profile_img' => [
                'nullable',
                'string',
                'max:500',
            ],

            'status' => [
                'sometimes',
                Rule::in([0, 1]),
            ],
        ];
    }
}
