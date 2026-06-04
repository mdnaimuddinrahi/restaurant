<?php

namespace App\OpenApi\Role;

use OpenApi\Attributes as OA;

#[OA\Delete(
    path: '/roles/{id}',
    tags: ['Roles'],
    summary: 'Delete Role',
    description: 'Delete a role by ID',

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
                example: 4
            )
        )
    ],

    responses: [
        new OA\Response(
            response: 200,
            description: 'Role deleted successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Role deleted successfully'
                    )
                ]
            )
        ),

        new OA\Response(
            response: 404,
            description: 'Role not found',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Role not found'
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
class DeleteRole
{
}