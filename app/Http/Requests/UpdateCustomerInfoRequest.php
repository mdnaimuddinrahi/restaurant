<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerInfoRequest extends FormRequest
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
        $customerInfoId = $this->route('customer_info');

        return [

            'customer_id' => [
                'nullable',
                'integer',
                'exists:customers,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'nullable',
                'email:rfc,dns',
                'max:255',
                Rule::unique('customer_infos', 'email')
                    ->ignore($customerInfoId),
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique('customer_infos', 'phone')
                    ->ignore($customerInfoId),
            ],

            'address' => [
                'nullable',
                'string',
                'max:2000',
            ],

            'city' => [
                'nullable',
                'string',
                'max:100',
            ],

            'state' => [
                'nullable',
                'string',
                'max:100',
            ],

            'country' => [
                'nullable',
                'string',
                'max:100',
            ],

            'postal_code' => [
                'nullable',
                'string',
                'max:20',
            ],

            'customer_level' => [
                'sometimes',
                Rule::in([0, 1, 2]),
            ],

            'total_spent' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'total_orders' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'reward_points' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'is_blocked' => [
                'sometimes',
                Rule::in([0, 1]),
            ],

            'meta' => [
                'nullable',
                'array',
            ],
        ];
    }
}
