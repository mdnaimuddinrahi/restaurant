<?php

namespace App\OpenApi\Role;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/roles',
    tags: ['Roles'],
    summary: 'Get all roles',
    description: 'Returns list of roles for user',

    security: [
        ['bearerAuth' => []]
    ],

    responses: [
        new OA\Response(
            response: 200,
            description: 'Roles fetched successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Roles of User'
                    ),
                    new OA\Property(
                        property: 'data',
                        type: 'array',
                        items: new OA\Items(
                            type: 'object',
                            properties: [
                                new OA\Property(property: 'id', type: 'integer', example: 2),
                                new OA\Property(property: 'name', type: 'string', example: 'Manager'),
                                new OA\Property(property: 'status', type: 'string', example: 'assigned'),
                                new OA\Property(property: 'created_at', type: 'string', example: '2026-06-04 04:21:58'),
                                new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-04 04:50:43'),
                                new OA\Property(property: 'created_by', type: 'integer', nullable: true, example: null),
                                new OA\Property(property: 'updated_by', type: 'integer', nullable: true, example: 1)
                            ]
                        )
                    )
                ]
            )
        ),

        new OA\Response(
            response: 401,
            description: 'Unauthenticated'
        )
    ]
)]
class GetRoles {}