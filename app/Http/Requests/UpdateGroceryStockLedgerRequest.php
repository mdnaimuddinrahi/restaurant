<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGroceryStockLedgerRequest extends FormRequest
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
            'grocery_id' => [
                'required',
                'integer',
                'exists:groceries,id',
            ],

            'reference_type' => [
                'required',
                'string',
                'max:50',
            ],

            'reference_id' => [
                'nullable',
                'integer',
            ],

            'transaction_type' => [
                'required',
                Rule::in([1, 2, 3]), // IN, OUT, ADJUSTMENT
            ],

            'quantity' => [
                'required',
                'numeric',
                'gt:0',
            ],

            'unit_price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'total_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'balance_before' => [
                'required',
                'numeric',
                'min:0',
            ],

            'balance_after' => [
                'required',
                'numeric',
                'min:0',
            ],

            'remarks' => [
                'nullable',
                'string',
                'max:2000',
            ],

            'transaction_date' => [
                'required',
                'date',
            ],
        ];
    }
}
