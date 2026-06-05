<?php

namespace App\OpenApi\ProductVarieties;

use OpenApi\Attributes as OA;

#[OA\Delete(
    path: '/product-varieties/{id}',
    tags: ['Product Varieties'],
    summary: 'Delete Product Variety',
    description: 'Delete a product variety by ID',
    security: [
        ['bearerAuth' => []]
    ],
    parameters: [
        new OA\Parameter(
            name: 'id',
            description: 'Product Variety ID',
            in: 'path',
            required: true,
            schema: new OA\Schema(type: 'integer', example: 1)
        )
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Product variety deleted successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Product Variety deleted successfully'
                    )
                ]
            )
        ),
        new OA\Response(
            response: 404,
            description: 'Product variety not found',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'No Product Variety found'
                    )
                ]
            )
        ),
        new OA\Response(response: 401, description: 'Unauthenticated')
    ]
)]
class ProductVarietiesDelete {}
