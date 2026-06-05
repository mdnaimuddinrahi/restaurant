<?php

namespace App\OpenApi\Employee;

use OpenApi\Attributes as OA;

#[OA\Delete(
    path: '/employees/{id}',
    operationId: 'deleteEmployee',
    summary: 'Delete Employee',
    security: [['sanctum' => []]],
    tags: ['Employee']
)]
#[OA\Parameter(
    name: 'id',
    description: 'Employee ID',
    in: 'path',
    required: true,
    schema: new OA\Schema(type: 'integer', example: 22)
)]
#[OA\Response(
    response: 200,
    description: 'Employee deleted successfully',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(
                property: 'message',
                type: 'string',
                example: 'Employee deleted successfully'
            )
        ]
    )
)]
#[OA\Response(
    response: 404,
    description: 'Employee not found',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(
                property: 'message',
                type: 'string',
                example: 'Employee not found'
            )
        ]
    )
)]
class EmployeeDelete
{
}