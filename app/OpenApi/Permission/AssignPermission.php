<?php

namespace App\OpenApi\Permission;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/permissions/assign',
    operationId: 'assignPermissionsToRole',
    summary: 'Assign permissions to role',
    description: 'Assign one or more permissions to a role. Existing permissions not included in the request will be removed.',
    tags: ['Permissions'],
    security: [['sanctum' => []]],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['role_id', 'permissions'],
            properties: [
                new OA\Property(
                    property: 'role_id',
                    type: 'integer',
                    example: 2
                ),
                new OA\Property(
                    property: 'permissions',
                    type: 'array',
                    items: new OA\Items(
                        type: 'integer'
                    ),
                    example: [3, 4]
                )
            ]
        )
    ),
    responses: [
        new OA\Response(
            response: 200,
            description: 'Permissions assigned successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'success',
                        type: 'boolean',
                        example: true
                    ),
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Permissions assigned successfully.'
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
class AssignPermission
{
}