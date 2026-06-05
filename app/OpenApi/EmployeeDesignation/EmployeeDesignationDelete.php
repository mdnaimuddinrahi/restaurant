<?php

namespace App\OpenApi\EmployeeDesignation;

use OpenApi\Attributes as OA;

#[OA\Delete(
    path: '/employee-designations/{id}',
    operationId: 'deleteEmployeeDesignation',
    summary: 'Delete Employee Designation',
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
    description: 'Employee designation deleted successfully',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(property: 'message', type: 'string', example: 'Employee Designation deleted successfully')
        ]
    )
)]
#[OA\Response(
    response: 404,
    description: 'Employee designation not found',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(property: 'message', type: 'string', example: 'Employee Designation not found')
        ]
    )
)]
class EmployeeDesignationDelete {}
