<?php

namespace App\OpenApi\EmployeeType;

use OpenApi\Attributes as OA;

#[OA\Put(
    path: '/employee-types/{id}',
    operationId: 'updateEmployeeType',
    summary: 'Update Employee Type',
    security: [['sanctum' => []]],
    tags: ['Employee Type']
)]
#[OA\Parameter(
    name: 'id',
    in: 'path',
    required: true,
    schema: new OA\Schema(type: 'integer', example: 1)
)]
#[OA\RequestBody(
    required: true,
    content: new OA\JsonContent(
        properties: [
            new OA\Property(property: 'name', type: 'string', example: 'Full-Time'),
            new OA\Property(property: 'code', type: 'string', example: 'FT'),
            new OA\Property(property: 'description', type: 'string', example: 'Updated description'),
            new OA\Property(property: 'shift_start', type: 'string', example: '09:00:00'),
            new OA\Property(property: 'shift_end', type: 'string', example: '17:00:00'),
            new OA\Property(property: 'working_hours', type: 'integer', example: 480),
        ]
    )
)]
#[OA\Response(
    response: 200,
    description: 'Employee type updated successfully',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(property: 'message', type: 'string', example: 'Employee type updated successfully'),
            new OA\Property(property: 'data', type: 'object')
        ]
    )
)]
class EmployeeTypeUpdate {}