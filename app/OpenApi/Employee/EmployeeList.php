<?php

namespace App\OpenApi\Employee;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/employees',
    operationId: 'getEmployees',
    summary: 'Get Employee List (Paginated)',
    security: [['sanctum' => []]],
    tags: ['Employee']
)]
#[OA\Parameter(
    name: 'page',
    in: 'query',
    required: false,
    description: 'Page number',
    schema: new OA\Schema(type: 'integer', example: 1)
)]
#[OA\Parameter(
    name: 'per_page',
    in: 'query',
    required: false,
    description: 'Items per page',
    schema: new OA\Schema(type: 'integer', example: 10)
)]
#[OA\Response(
    response: 200,
    description: 'Employee list retrieved successfully',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(
                property: 'message',
                type: 'string',
                example: 'Employee list retrieved successfully'
            ),

            new OA\Property(
                property: 'data',
                type: 'array',
                items: new OA\Items(
                    type: 'object',
                    properties: [
                        new OA\Property(property: 'id', type: 'integer', example: 22),

                        new OA\Property(property: 'employee_type_id', type: 'integer', example: 1),
                        new OA\Property(property: 'employee_designation_id', type: 'integer', example: 2),
                        new OA\Property(property: 'user_id', type: 'integer', nullable: true, example: null),

                        new OA\Property(property: 'name', type: 'string', example: 'John Smith'),
                        new OA\Property(property: 'email', type: 'string', example: 'johnsmith2@gmail.com'),
                        new OA\Property(property: 'phone', type: 'string', example: '1000000001'),

                        new OA\Property(property: 'is_active', type: 'boolean', example: true),
                        new OA\Property(property: 'gender', type: 'integer', example: 1),

                        new OA\Property(property: 'basic_salary', type: 'string', example: '35000.00'),

                        new OA\Property(property: 'created_at', type: 'string', example: '2026-06-05 03:34:12'),
                        new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-05 03:34:12'),
                    ]
                )
            ),

            new OA\Property(
                property: 'meta',
                type: 'object',
                properties: [
                    new OA\Property(property: 'current_page', type: 'integer', example: 1),
                    new OA\Property(property: 'last_page', type: 'integer', example: 5),
                    new OA\Property(property: 'per_page', type: 'integer', example: 10),
                    new OA\Property(property: 'total', type: 'integer', example: 50),
                ]
            )
        ]
    )
)]
class EmployeeList
{
}