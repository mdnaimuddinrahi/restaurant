<?php

namespace App\OpenApi\Product;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/products/{product}',
    tags: ['Products'],
    summary: 'Get Product by ID',
    description: 'Returns a single product details',
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
            description: 'Product fetched successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'message', type: 'string', example: 'Product retrieved successfully'),
                    new OA\Property(
                        property: 'data',
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
                ]
            )
        ),
        new OA\Response(response: 400, description: 'Product not found'),
        new OA\Response(response: 401, description: 'Unauthenticated')
    ]
)]
class ProductDetails {}
