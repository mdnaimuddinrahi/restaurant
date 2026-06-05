<?php

namespace App\OpenApi\Employee;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/employees',
    operationId: 'createEmployee',
    summary: 'Create Employee',
    security: [['sanctum' => []]],
    tags: ['Employee']
)]
#[OA\RequestBody(
    required: true,
    content: new OA\JsonContent(
        required: [
            'employee_type_id',
            'employee_designation_id',
            'name'
        ],
        properties: [
            new OA\Property(property: 'employee_type_id', type: 'integer', example: 1),
            new OA\Property(property: 'employee_designation_id', type: 'integer', example: 2),
            new OA\Property(property: 'user_id', type: 'integer', nullable: true, example: null),

            new OA\Property(property: 'name', type: 'string', example: 'John Smith'),
            new OA\Property(property: 'email', type: 'string', example: 'johnsmith2@gmail.com'),
            new OA\Property(property: 'phone', type: 'string', example: '1000000001'),
            new OA\Property(property: 'address', type: 'string', example: 'Global Office Location 1'),

            new OA\Property(property: 'date_of_birth', type: 'string', format: 'date', example: '1995-08-15'),
            new OA\Property(property: 'date_of_joining', type: 'string', format: 'date', example: '2025-01-10'),

            new OA\Property(property: 'is_active', type: 'boolean', example: true),
            new OA\Property(property: 'gender', type: 'integer', example: 1),

            new OA\Property(property: 'profile_img', type: 'string', nullable: true, example: null),

            new OA\Property(property: 'national_id', type: 'string', example: 'NID-G-99999'),
            new OA\Property(property: 'passport_number', type: 'string', example: 'PPT-G-99999'),

            new OA\Property(property: 'emergency_contact_name', type: 'string', example: 'Emma Smith'),
            new OA\Property(property: 'emergency_contact_phone', type: 'string', example: '9000000001'),
            new OA\Property(property: 'emergency_contact_relation', type: 'string', example: 'Family'),

            new OA\Property(
                property: 'documents',
                type: 'array',
                items: new OA\Items(type: 'object'),
                example: []
            ),

            new OA\Property(property: 'basic_salary', type: 'number', format: 'float', example: 35000),
            new OA\Property(property: 'termination_date', type: 'string', nullable: true, example: null),

            new OA\Property(property: 'blood_group', type: 'integer', example: 1),
            new OA\Property(property: 'marital_status', type: 'integer', example: 1),

            new OA\Property(property: 'shift_start', type: 'string', example: '09:00:00'),
            new OA\Property(property: 'shift_end', type: 'string', example: '17:00:00'),
        ]
    )
)]
#[OA\Response(
    response: 201,
    description: 'Employee created successfully',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(
                property: 'message',
                type: 'string',
                example: 'Employee created successfully'
            ),

            new OA\Property(
                property: 'data',
                properties: [
                    new OA\Property(property: 'id', type: 'integer', example: 22),
                    new OA\Property(property: 'employee_type_id', type: 'integer', example: 1),
                    new OA\Property(property: 'employee_designation_id', type: 'integer', example: 2),
                    new OA\Property(property: 'user_id', type: 'integer', nullable: true, example: null),

                    new OA\Property(property: 'name', type: 'string', example: 'John Smith'),
                    new OA\Property(property: 'email', type: 'string', example: 'johnsmith2@gmail.com'),
                    new OA\Property(property: 'phone', type: 'string', example: '1000000001'),
                    new OA\Property(property: 'address', type: 'string', example: 'Global Office Location 1'),

                    new OA\Property(property: 'date_of_birth', type: 'string', example: '1995-08-15'),
                    new OA\Property(property: 'date_of_joining', type: 'string', example: '2025-01-10'),

                    new OA\Property(property: 'is_active', type: 'boolean', example: true),
                    new OA\Property(property: 'gender', type: 'integer', example: 1),

                    new OA\Property(property: 'profile_img', type: 'string', nullable: true, example: null),

                    new OA\Property(property: 'national_id', type: 'string', example: 'NID-G-99999'),
                    new OA\Property(property: 'passport_number', type: 'string', example: 'PPT-G-99999'),

                    new OA\Property(property: 'emergency_contact_name', type: 'string', example: 'Emma Smith'),
                    new OA\Property(property: 'emergency_contact_phone', type: 'string', example: '9000000001'),
                    new OA\Property(property: 'emergency_contact_relation', type: 'string', example: 'Family'),

                    new OA\Property(
                        property: 'documents',
                        type: 'array',
                        items: new OA\Items(type: 'object'),
                        example: []
                    ),

                    new OA\Property(property: 'basic_salary', type: 'string', example: '35000.00'),
                    new OA\Property(property: 'termination_date', type: 'string', nullable: true, example: null),

                    new OA\Property(property: 'blood_group', type: 'integer', example: 1),
                    new OA\Property(property: 'marital_status', type: 'integer', example: 1),

                    new OA\Property(property: 'shift_start', type: 'string', example: '09:00:00'),
                    new OA\Property(property: 'shift_end', type: 'string', example: '17:00:00'),

                    new OA\Property(property: 'created_by', type: 'integer', example: 1),

                    new OA\Property(property: 'created_at', type: 'string', example: '2026-06-05 03:34:12'),
                    new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-05 03:34:12'),
                ],
                type: 'object'
            )
        ]
    )
)]
class EmployeeCreate
{
}