<?php

namespace App\OpenApi\EmployeeDesignation;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/employee-designations',
    operationId: 'listEmployeeDesignations',
    summary: 'Get Employee Designations',
    security: [['sanctum' => []]],
    tags: ['Employee Designation']
)]
#[OA\Response(
    response: 200,
    description: 'Employee designations list',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(
                property: 'data',
                type: 'array',
                items: new OA\Items(
                    type: 'object',
                    properties: [
                        new OA\Property(property: 'id', type: 'integer', example: 1),
                        new OA\Property(property: 'name', type: 'string', example: 'Manager'),
                        new OA\Property(property: 'description', type: 'string', example: 'Manages the team'),
                        new OA\Property(property: 'is_active', type: 'boolean', example: true),
                    ]
                )
            )
        ]
    )
)]
class EmployeeDesignationList {}
