<?php

namespace App\OpenApi\ProductCategories;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/product-categories/{id}',
    tags: ['Product Categories'],
    summary: 'Get Product Category by ID',
    description: 'Returns a single product category details',

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
            description: 'Product category fetched successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Product category details'
                    ),
                    new OA\Property(
                        property: 'data',
                        type: 'object',
                        properties: [
                            new OA\Property(property: 'id', type: 'integer', example: 1),
                            new OA\Property(property: 'name', type: 'string', example: 'Beverages'),
                            new OA\Property(property: 'description', type: 'string', nullable: true, example: 'All types of beverages and drinks'),
                            new OA\Property(property: 'status', type: 'string', example: 'active'),
                            new OA\Property(property: 'created_by', type: 'integer', example: 1),
                            new OA\Property(property: 'created_at', type: 'string', example: '2026-06-05 19:23:24'),
                            new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-05 19:23:24')
                        ]
                    )
                ]
            )
        ),

        new OA\Response(
            response: 404,
            description: 'Product category not found'
        ),

        new OA\Response(
            response: 401,
            description: 'Unauthenticated'
        )
    ]
)]
class ProductCategoriesDetails {}
