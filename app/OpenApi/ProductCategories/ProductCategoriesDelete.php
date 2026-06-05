<?php

namespace App\OpenApi\ProductCategories;

use OpenApi\Attributes as OA;

#[OA\Delete(
    path: '/product-categories/{id}',
    tags: ['Product Categories'],
    summary: 'Delete Product Category',
    description: 'Delete a product category by ID',

    security: [
        ['bearerAuth' => []]
    ],

    parameters: [
        new OA\Parameter(
            name: 'id',
            description: 'Product Category ID',
            in: 'path',
            required: true,
            schema: new OA\Schema(
                type: 'integer',
                example: 1
            )
        )
    ],

    responses: [
        new OA\Response(
            response: 200,
            description: 'Product category deleted successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Product category deleted successfully'
                    )
                ]
            )
        ),

        new OA\Response(
            response: 404,
            description: 'Product category not found',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Product category not found'
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
class ProductCategoriesDelete
{
}
