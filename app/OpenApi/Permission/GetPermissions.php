<?php

namespace App\OpenApi\Permission;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/permissions',
    operationId: 'getPermissions',
    summary: 'Get all permissions',
    description: 'Retrieve all permissions grouped by module',
    tags: ['Permissions'],
    security: [['sanctum' => []]],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Permissions retrieved successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Permissions retrieved successfully'
                    ),
                    new OA\Property(
                        property: 'data',
                        type: 'array',
                        items: new OA\Items(
                            properties: [
                                new OA\Property(
                                    property: 'id',
                                    type: 'integer',
                                    example: 1
                                ),
                                new OA\Property(
                                    property: 'group_id',
                                    type: 'integer',
                                    example: 1
                                ),
                                new OA\Property(
                                    property: 'group_name',
                                    type: 'string',
                                    example: 'Roles'
                                ),
                                new OA\Property(
                                    property: 'name',
                                    type: 'string',
                                    example: 'View Roles'
                                ),
                                new OA\Property(
                                    property: 'slug',
                                    type: 'string',
                                    example: 'roles.index'
                                ),
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
class GetPermissions
{
}