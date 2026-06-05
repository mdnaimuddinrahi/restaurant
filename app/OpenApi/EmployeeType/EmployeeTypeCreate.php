<?php

namespace App\OpenApi\EmployeeType;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/employee-types',
    operationId: 'createEmployeeType',
    summary: 'Create Employee Type',
    security: [['sanctum' => []]],
    tags: ['Employee Type']
)]
#[OA\RequestBody(
    required: true,
    content: new OA\JsonContent(
        required: ['name', 'code'],
        properties: [
            new OA\Property(property: 'name', type: 'string', example: 'Full-Time'),
            new OA\Property(property: 'code', type: 'string', example: 'FT'),
            new OA\Property(property: 'description', type: 'string', example: 'Employees who work full-time schedule'),
            new OA\Property(property: 'shift_start', type: 'string', example: '09:00:00'),
            new OA\Property(property: 'shift_end', type: 'string', example: '17:00:00'),
            new OA\Property(property: 'working_hours', type: 'integer', example: 480),
        ]
    )
)]
#[OA\Response(
    response: 201,
    description: 'Employee type created successfully',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(property: 'message', type: 'string', example: 'Employee type created successfully'),
            new OA\Property(
                property: 'data',
                type: 'object',
                properties: [
                    new OA\Property(property: 'id', type: 'integer', example: 1),
                    new OA\Property(property: 'name', type: 'string', example: 'Full-Time'),
                    new OA\Property(property: 'code', type: 'string', example: 'FT'),
                    new OA\Property(property: 'description', type: 'string', example: 'Employees who work full-time schedule'),
                    new OA\Property(property: 'shift_start', type: 'string', example: '09:00:00'),
                    new OA\Property(property: 'shift_end', type: 'string', example: '17:00:00'),
                    new OA\Property(property: 'working_hours', type: 'integer', example: 480),
                    new OA\Property(property: 'created_at', type: 'string', example: '2026-06-05 10:00:00'),
                ]
            )
        ]
    )
)]
class EmployeeTypeCreate {}