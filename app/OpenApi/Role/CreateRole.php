<?php

namespace App\OpenApi\Role;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/roles',
    tags: ['Roles'],
    summary: 'Create Role',
    description: 'Create a new role',

    security: [
        ['bearerAuth' => []]
    ],

    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['name'],
            properties: [
                new OA\Property(
                    property: 'name',
                    type: 'string',
                    example: 'Stuff'
                )
            ]
        )
    ),

    responses: [
        new OA\Response(
            response: 201,
            description: 'Role created successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Role created'
                    ),
                    new OA\Property(
                        property: 'data',
                        type: 'object',
                        properties: [
                            new OA\Property(property: 'id', type: 'integer', example: 10),
                            new OA\Property(property: 'name', type: 'string', example: 'Stuff'),
                            new OA\Property(property: 'status', type: 'string', example: 'not assigned'),
                            new OA\Property(property: 'created_by', type: 'integer', example: 1),
                            new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-04 05:08:47'),
                            new OA\Property(property: 'created_at', type: 'string', example: '2026-06-04 05:08:47')
                        ]
                    )
                ]
            )
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
class CreateRole {}