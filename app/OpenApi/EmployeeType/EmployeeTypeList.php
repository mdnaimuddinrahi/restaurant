<?php

namespace App\OpenApi\EmployeeType;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/employee-types',
    operationId: 'listEmployeeTypes',
    summary: 'Get Employee Types',
    security: [['sanctum' => []]],
    tags: ['Employee Type']
)]
#[OA\Response(
    response: 200,
    description: 'Employee types list',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(
                property: 'data',
                type: 'array',
                items: new OA\Items(
                    type: 'object',
                    properties: [
                        new OA\Property(property: 'id', type: 'integer', example: 1),
                        new OA\Property(property: 'name', type: 'string', example: 'Full-Time'),
                        new OA\Property(property: 'code', type: 'string', example: 'FT'),
                        new OA\Property(property: 'is_active', type: 'boolean', example: true),
                    ]
                )
            )
        ]
    )
)]
class EmployeeTypeList {}