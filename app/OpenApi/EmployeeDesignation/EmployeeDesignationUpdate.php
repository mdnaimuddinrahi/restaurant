<?php

namespace App\OpenApi\EmployeeDesignation;

use OpenApi\Attributes as OA;

#[OA\Put(
    path: '/employee-designations/{id}',
    operationId: 'updateEmployeeDesignation',
    summary: 'Update Employee Designation',
    security: [['sanctum' => []]],
    tags: ['Employee Designation']
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
            new OA\Property(property: 'name', type: 'string', example: 'Senior Manager'),
            new OA\Property(property: 'description', type: 'string', example: 'Updated designation description'),
            new OA\Property(property: 'is_active', type: 'boolean', example: true),
        ]
    )
)]
#[OA\Response(
    response: 200,
    description: 'Employee designation updated successfully',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(property: 'message', type: 'string', example: 'Employee Designation updated successfully'),
            new OA\Property(property: 'data', type: 'object')
        ]
    )
)]
class EmployeeDesignationUpdate {}
