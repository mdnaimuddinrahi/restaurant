<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeTypeRequest extends FormRequest
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
        $employeeTypeId = $this->route('employee_type')?->id;

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('employee_types', 'name')->ignore($employeeTypeId),
            ],

            'code' => [
                'required',
                'string',
                'max:100',
                Rule::unique('employee_types', 'code')->ignore($employeeTypeId),
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'shift_start' => [
                'nullable',
                'date_format:H:i:s',
            ],

            'shift_end' => [
                'nullable',
                'date_format:H:i:s',
                'after:shift_start',
            ],

            'working_hours' => [
                'nullable',
                'integer',
                'min:1',
                'max:1440',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'Employee type name already exists.',
            'code.unique' => 'Employee type code already exists.',
            'shift_end.after' => 'Shift end must be after shift start.',
        ];
    }
}
