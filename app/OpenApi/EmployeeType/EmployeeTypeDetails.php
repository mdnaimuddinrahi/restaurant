<?php

namespace App\OpenApi\EmployeeType;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/employee-types/{id}',
    operationId: 'getEmployeeTypeDetails',
    summary: 'Get Employee Type Details',
    security: [['sanctum' => []]],
    tags: ['Employee Type']
)]
#[OA\Parameter(
    name: 'id',
    in: 'path',
    required: true,
    description: 'Employee Type ID',
    schema: new OA\Schema(type: 'integer', example: 1)
)]
#[OA\Response(
    response: 200,
    description: 'Employee type details retrieved successfully',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(
                property: 'message',
                type: 'string',
                example: 'Employee type details retrieved successfully'
            ),
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
                    new OA\Property(property: 'is_active', type: 'boolean', example: true),
                    new OA\Property(property: 'created_at', type: 'string', example: '2026-06-05 10:00:00'),
                    new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-05 10:30:00'),
                ]
            )
        ]
    )
)]
class EmployeeTypeDetails {}