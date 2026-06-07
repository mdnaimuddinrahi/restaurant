<?php

namespace App\OpenApi\Product;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/products',
    tags: ['Products'],
    summary: 'Create Product',
    description: 'Create a new product',
    security: [
        ['bearerAuth' => []]
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['name', 'slug', 'price'],
            properties: [
                new OA\Property(property: 'name', type: 'string', example: 'Product 1'),
                new OA\Property(property: 'slug', type: 'string', example: 'product-1'),
                new OA\Property(property: 'image', type: 'string', nullable: true, example: null),
                new OA\Property(property: 'price', type: 'number', format: 'float', example: 606),
                new OA\Property(property: 'variety_id', type: 'integer', nullable: true, example: 5),
                new OA\Property(property: 'category_id', type: 'integer', nullable: true, example: 6),
                new OA\Property(property: 'announcement_id', type: 'integer', nullable: true, example: null),
                new OA\Property(property: 'is_available', type: 'boolean', example: true),
                new OA\Property(property: 'description', type: 'string', nullable: true, example: null),
                new OA\Property(property: 'sku', type: 'string', nullable: true, example: null)
            ]
        )
    ),
    responses: [
        new OA\Response(
            response: 201,
            description: 'Product created successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'message', type: 'string', example: 'Product created successfully'),
                    new OA\Property(
                        property: 'data',
                        type: 'object',
                        properties: [
                            new OA\Property(property: 'id', type: 'integer', example: 31),
                            new OA\Property(property: 'name', type: 'string', example: 'Product 1'),
                            new OA\Property(property: 'slug', type: 'string', example: 'product-1'),
                            new OA\Property(property: 'image', type: 'string', nullable: true, example: null),
                            new OA\Property(property: 'price', type: 'number', format: 'float', example: 606),
                            new OA\Property(property: 'variety_id', type: 'integer', nullable: true, example: 5),
                            new OA\Property(property: 'category_id', type: 'integer', nullable: true, example: 6),
                            new OA\Property(property: 'announcement_id', type: 'integer', nullable: true, example: null),
                            new OA\Property(property: 'is_available', type: 'boolean', example: true),
                            new OA\Property(property: 'description', type: 'string', nullable: true, example: null),
                            new OA\Property(property: 'sku', type: 'string', nullable: true, example: null),
                            new OA\Property(property: 'created_by', type: 'integer', nullable: true, example: 1),
                            new OA\Property(property: 'updated_by', type: 'integer', nullable: true, example: null),
                            new OA\Property(property: 'created_at', type: 'string', example: '2026-06-06 20:10:09'),
                            new OA\Property(property: 'updated_at', type: 'string', nullable: true, example: null)
                        ]
                    )
                ]
            )
        ),
        new OA\Response(response: 422, description: 'Validation error'),
        new OA\Response(response: 401, description: 'Unauthenticated')
    ]
)]
class ProductCreate {}
