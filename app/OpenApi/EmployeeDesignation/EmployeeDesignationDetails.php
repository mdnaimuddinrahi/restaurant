<?php

namespace App\OpenApi\EmployeeDesignation;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/employee-designations/{id}',
    operationId: 'getEmployeeDesignationDetails',
    summary: 'Get Employee Designation Details',
    security: [['sanctum' => []]],
    tags: ['Employee Designation']
)]
#[OA\Parameter(
    name: 'id',
    in: 'path',
    required: true,
    description: 'Employee Designation ID',
    schema: new OA\Schema(type: 'integer', example: 1)
)]
#[OA\Response(
    response: 200,
    description: 'Employee designation details retrieved successfully',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(property: 'message', type: 'string', example: 'Employee Designation retrieved successfully'),
            new OA\Property(
                property: 'data',
                type: 'object',
                properties: [
                    new OA\Property(property: 'id', type: 'integer', example: 1),
                    new OA\Property(property: 'name', type: 'string', example: 'Manager'),
                    new OA\Property(property: 'description', type: 'string', example: 'Manages the team and staff'),
                    new OA\Property(property: 'is_active', type: 'boolean', example: true),
                    new OA\Property(property: 'created_at', type: 'string', example: '2026-06-05 10:00:00'),
                    new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-05 10:30:00'),
                ]
            )
        ]
    )
)]
class EmployeeDesignationDetails {}
