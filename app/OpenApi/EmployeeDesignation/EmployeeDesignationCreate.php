<?php

namespace App\OpenApi\EmployeeDesignation;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/employee-designations',
    operationId: 'createEmployeeDesignation',
    summary: 'Create Employee Designation',
    security: [['sanctum' => []]],
    tags: ['Employee Designation']
)]
#[OA\RequestBody(
    required: true,
    content: new OA\JsonContent(
        required: ['name'],
        properties: [
            new OA\Property(property: 'name', type: 'string', example: 'Manager'),
            new OA\Property(property: 'description', type: 'string', example: 'Manages the team and staff'),
            new OA\Property(property: 'is_active', type: 'boolean', example: true),
        ]
    )
)]
#[OA\Response(
    response: 201,
    description: 'Employee designation created successfully',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(property: 'message', type: 'string', example: 'Employee Designation created successfully'),
            new OA\Property(
                property: 'data',
                type: 'object',
                properties: [
                    new OA\Property(property: 'id', type: 'integer', example: 1),
                    new OA\Property(property: 'name', type: 'string', example: 'Manager'),
                    new OA\Property(property: 'description', type: 'string', example: 'Manages the team and staff'),
                    new OA\Property(property: 'is_active', type: 'boolean', example: true),
                    new OA\Property(property: 'created_at', type: 'string', example: '2026-06-05 10:00:00'),
                ]
            )
        ]
    )
)]
class EmployeeDesignationCreate {}
