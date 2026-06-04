<?php

namespace App\OpenApi\Role;

use OpenApi\Attributes as OA;

#[OA\Put(
    path: '/roles/{id}',
    tags: ['Roles'],
    summary: 'Update Role',
    description: 'Update role by ID',

    security: [
        ['bearerAuth' => []]
    ],

    parameters: [
        new OA\Parameter(
            name: 'id',
            description: 'Role ID',
            in: 'path',
            required: true,
            schema: new OA\Schema(
                type: 'integer',
                example: 2
            )
        )
    ],

    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['name'],
            properties: [
                new OA\Property(
                    property: 'name',
                    type: 'string',
                    example: 'Manager Updated'
                )
            ]
        )
    ),

    responses: [
        new OA\Response(
            response: 200,
            description: 'Role updated successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Role updated successfully'
                    ),
                    new OA\Property(
                        property: 'data',
                        type: 'object',
                        properties: [
                            new OA\Property(property: 'id', type: 'integer', example: 2),
                            new OA\Property(property: 'name', type: 'string', example: 'Manager Updated'),
                            new OA\Property(property: 'status', type: 'string', example: 'assigned'),
                            new OA\Property(property: 'created_at', type: 'string', example: '2026-06-04 04:21:58'),
                            new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-04 05:20:00'),
                            new OA\Property(property: 'created_by', type: 'integer', nullable: true, example: null),
                            new OA\Property(property: 'updated_by', type: 'integer', example: 1)
                        ]
                    )
                ]
            )
        ),

        new OA\Response(
            response: 404,
            description: 'Role not found'
        ),

        new OA\Response(
            response: 422,
            description: 'Validation error'
        ),

        new OA\Response(
            response: 401,
            description: 'Unauthenticated'
        )
    ]
)]
class UpdateRole {}