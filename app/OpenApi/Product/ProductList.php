<?php

namespace App\OpenApi\Product;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/products',
    tags: ['Products'],
    summary: 'Get all products',
    description: 'Returns a list of all products',
    security: [
        ['bearerAuth' => []]
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Products fetched successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Products retrieved successfully'
                    ),
                    new OA\Property(
                        property: 'data',
                        type: 'array',
                        items: new OA\Items(
                            type: 'object',
                            properties: [
                                new OA\Property(property: 'id', type: 'integer', example: 1),
                                new OA\Property(property: 'name', type: 'string', example: 'Classic Burger'),
                                new OA\Property(property: 'slug', type: 'string', example: 'classic-burger'),
                                new OA\Property(property: 'image', type: 'string', nullable: true, example: 'products/classic-burger.png'),
                                new OA\Property(property: 'price', type: 'number', format: 'float', example: 12.5),
                                new OA\Property(property: 'variety_id', type: 'integer', nullable: true, example: 1),
                                new OA\Property(property: 'category_id', type: 'integer', nullable: true, example: 2),
                                new OA\Property(property: 'announcement_id', type: 'integer', nullable: true, example: 3),
                                new OA\Property(property: 'is_available', type: 'boolean', example: true),
                                new OA\Property(property: 'description', type: 'string', nullable: true, example: 'A popular burger option'),
                                new OA\Property(property: 'sku', type: 'string', nullable: true, example: 'BUR-001'),
                                new OA\Property(property: 'created_by', type: 'integer', nullable: true, example: 1),
                                new OA\Property(property: 'updated_by', type: 'integer', nullable: true, example: 1),
                                new OA\Property(property: 'created_at', type: 'string', example: '2026-06-05 19:23:24'),
                                new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-05 19:23:24')
                            ]
                        )
                    )
                ]
            )
        ),
        new OA\Response(response: 401, description: 'Unauthenticated')
    ]
)]
class ProductList {}
