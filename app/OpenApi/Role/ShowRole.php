<?php

namespace App\OpenApi\Role;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/roles/{id}',
    tags: ['Roles'],
    summary: 'Get Role by ID',
    description: 'Returns a single role details',

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

    responses: [
        new OA\Response(
            response: 200,
            description: 'Role fetched successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Role details'
                    ),
                    new OA\Property(
                        property: 'data',
                        type: 'object',
                        properties: [
                            new OA\Property(property: 'id', type: 'integer', example: 2),
                            new OA\Property(property: 'name', type: 'string', example: 'Manager'),
                            new OA\Property(property: 'status', type: 'string', example: 'assigned'),
                            new OA\Property(property: 'created_at', type: 'string', example: '2026-06-04 04:21:58'),
                            new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-04 04:50:43'),
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
            response: 401,
            description: 'Unauthenticated'
        )
    ]
)]
class ShowRole {}