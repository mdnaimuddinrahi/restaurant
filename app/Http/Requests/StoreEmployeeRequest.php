<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
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
            'employee_type_id' => [
                'required',
                'integer',
                'exists:employee_types,id',
            ],

            'employee_designation_id' => [
                'required',
                'integer',
                'exists:employee_designations,id',
            ],

            'user_id' => [
                'nullable',
                'integer',
                'exists:users,id',
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
                'unique:employees,email',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            'address' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'date_of_birth' => [
                'nullable',
                'date',
                'before:today',
            ],

            'date_of_joining' => [
                'nullable',
                'date',
                'before_or_equal:today',
            ],

            'is_active' => [
                'sometimes',
                'boolean',
            ],

            'gender' => [
                'nullable',
                Rule::in(array_keys(Employee::genderList())), // 1=Male, 2=Female, 3=Other
            ],

            'profile_img' => [
                'nullable',
                'string',
                'max:500',
            ],

            'national_id' => [
                'nullable',
                'string',
                'max:50',
                'unique:employees,national_id',
            ],

            'passport_number' => [
                'nullable',
                'string',
                'max:50',
                'unique:employees,passport_number',
            ],

            'emergency_contact_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'emergency_contact_phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            'emergency_contact_relation' => [
                'nullable',
                'string',
                'max:100',
            ],

            'documents' => [
                'nullable',
                'array',
            ],

            'documents.*.name' => [
                'required_with:documents',
                'string',
                'max:255',
            ],

            'documents.*.path' => [
                'required_with:documents',
                'string',
                'max:1000',
            ],

            'basic_salary' => [
                'nullable',
                'numeric',
                'min:0',
                'max:999999999.99',
            ],

            'termination_date' => [
                'nullable',
                'date',
                'after_or_equal:date_of_joining',
            ],

            'blood_group' => [
                'nullable',
                Rule::in(array_keys(Employee::bloodGroupList())),
            ],

            'marital_status' => [
                'nullable',
                Rule::in(array_keys(Employee::maritalStatusList())),
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
        ];
    }
}
