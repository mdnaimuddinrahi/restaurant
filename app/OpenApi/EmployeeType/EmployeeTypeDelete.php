<?php

namespace App\OpenApi\EmployeeType;

use OpenApi\Attributes as OA;

#[OA\Delete(
    path: '/employee-types/{id}',
    operationId: 'deleteEmployeeType',
    summary: 'Delete Employee Type',
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
    description: 'Employee type deleted successfully',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(
                property: 'message',
                type: 'string',
                example: 'Employee type deleted successfully'
            )
        ]
    )
)]
#[OA\Response(
    response: 404,
    description: 'Employee type not found',
    content: new OA\JsonContent(
        properties: [
            new OA\Property(property: 'message', type: 'string', example: 'Employee type not found')
        ]
    )
)]
class EmployeeTypeDelete {}