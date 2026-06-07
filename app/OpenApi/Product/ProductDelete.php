<?php

namespace App\OpenApi\Product;

use OpenApi\Attributes as OA;

#[OA\Delete(
    path: '/products/{product}',
    tags: ['Products'],
    summary: 'Delete Product',
    description: 'Delete a product by ID',
    security: [
        ['bearerAuth' => []]
    ],
    parameters: [
        new OA\Parameter(
            name: 'product',
            description: 'Product ID',
            in: 'path',
            required: true,
            schema: new OA\Schema(type: 'integer', example: 1)
        )
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Product deleted successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'message', type: 'string', example: 'Product deleted successfully')
                ]
            )
        ),
        new OA\Response(
            response: 400,
            description: 'Product not found',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'message', type: 'string', example: 'No Product found')
                ]
            )
        ),
        new OA\Response(response: 401, description: 'Unauthenticated')
    ]
)]
class ProductDelete {}
