<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeAttendanceRequest extends FormRequest
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
            'employee_id' => ['sometimes', 'integer', 'exists:employees,id'],
            'attendance_date' => ['sometimes', 'date'],
            'check_in_time' => ['sometimes', 'nullable', 'date_format:H:i:s'],
            'check_out_time' => ['sometimes', 'nullable', 'date_format:H:i:s'],
            'status' => ['sometimes', 'integer', Rule::in([0, 1, 2, 3])],
            'working_hours' => ['sometimes', 'integer', 'min:0'],
            'overtime_minutes' => ['sometimes', 'integer', 'min:0'],
            'remarks' => ['sometimes', 'nullable', 'string'],
        ];
    }
}
