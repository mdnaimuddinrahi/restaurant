<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGroceryPurchaseRequest extends FormRequest
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
        $grocery_purchase = $this->route('grocery_purchase');
        
        return [
            'supplier_id' => [
                'nullable',
                'integer',
                'exists:suppliers,id',
            ],

            'invoice_no' => [
                'nullable',
                'string',
                'max:100',
            ],

            'purchase_no' => [
                'sometimes',
                'string',
                'max:100',
                Rule::unique('grocery_purchases', 'purchase_no')
                ->ignore($grocery_purchase),
            ],

            'purchase_date' => [
                'required',
                'date',
            ],

            'subtotal_amount' => [
                'required',
                'numeric',
                'min:0',
            ],

            'discount_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'tax_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'shipping_cost' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'total_amount' => [
                'required',
                'numeric',
                'min:0',
            ],

            'paid_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'due_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'status' => [
                'sometimes',
                Rule::in([0, 1, 2, 3]),
            ],

            'payment_status' => [
                'sometimes',
                Rule::in([0, 1, 2]),
            ],

            'remarks' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ];
    }
}
