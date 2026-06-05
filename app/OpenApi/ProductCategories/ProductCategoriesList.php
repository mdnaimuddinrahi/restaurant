<?php

namespace App\OpenApi\ProductCategories;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/product-categories',
    tags: ['Product Categories'],
    summary: 'Get all product categories',
    description: 'Returns list of all product categories',

    security: [
        ['bearerAuth' => []]
    ],

    responses: [
        new OA\Response(
            response: 200,
            description: 'Product categories fetched successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Product categories list'
                    ),
                    new OA\Property(
                        property: 'data',
                        type: 'array',
                        items: new OA\Items(
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
class ProductCategoriesList {}
