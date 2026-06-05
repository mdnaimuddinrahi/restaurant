<?php

namespace App\OpenApi\ProductVarieties;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/product-varieties',
    tags: ['Product Varieties'],
    summary: 'Get all product varieties',
    description: 'Returns a list of all product varieties',
    security: [
        ['bearerAuth' => []]
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Product varieties fetched successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Product Varieties retrieved successfully'
                    ),
                    new OA\Property(
                        property: 'data',
                        type: 'array',
                        items: new OA\Items(
                            type: 'object',
                            properties: [
                                new OA\Property(property: 'id', type: 'integer', example: 1),
                                new OA\Property(property: 'name', type: 'string', example: 'Regular'),
                                new OA\Property(property: 'slug', type: 'string', example: 'regular'),
                                new OA\Property(property: 'category_id', type: 'integer', nullable: true, example: 1),
                                new OA\Property(property: 'status', type: 'integer', example: 1),
                                new OA\Property(property: 'image', type: 'string', nullable: true, example: 'varieties/regular.png'),
                                new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Default variety option'),
                                new OA\Property(property: 'sort_order', type: 'integer', example: 0),
                                new OA\Property(property: 'created_by', type: 'integer', nullable: true, example: 1),
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
class ProductVarietiesList {}
