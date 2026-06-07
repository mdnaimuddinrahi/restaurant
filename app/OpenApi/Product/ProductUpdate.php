<?php

namespace App\OpenApi\Product;

use OpenApi\Attributes as OA;

#[OA\Put(
    path: '/products/{product}',
    tags: ['Products'],
    summary: 'Update Product',
    description: 'Update product by ID',
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
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'name', type: 'string', example: 'Classic Burger Updated'),
                new OA\Property(property: 'slug', type: 'string', example: 'classic-burger-updated'),
                new OA\Property(property: 'image', type: 'string', nullable: true, example: 'products/classic-burger-updated.png'),
                new OA\Property(property: 'price', type: 'number', format: 'float', example: 13.5),
                new OA\Property(property: 'variety_id', type: 'integer', nullable: true, example: 1),
                new OA\Property(property: 'category_id', type: 'integer', nullable: true, example: 2),
                new OA\Property(property: 'announcement_id', type: 'integer', nullable: true, example: 3),
                new OA\Property(property: 'is_available', type: 'boolean', example: false),
                new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Updated burger option'),
                new OA\Property(property: 'sku', type: 'string', nullable: true, example: 'BUR-001-UPD')
            ]
        )
    ),
    responses: [
        new OA\Response(
            response: 200,
            description: 'Product updated successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'message', type: 'string', example: 'Product updated successfully'),
                    new OA\Property(
                        property: 'data',
                        type: 'object',
                        properties: [
                            new OA\Property(property: 'id', type: 'integer', example: 1),
                            new OA\Property(property: 'name', type: 'string', example: 'Classic Burger Updated'),
                            new OA\Property(property: 'slug', type: 'string', example: 'classic-burger-updated'),
                            new OA\Property(property: 'image', type: 'string', nullable: true, example: 'products/classic-burger-updated.png'),
                            new OA\Property(property: 'price', type: 'number', format: 'float', example: 13.5),
                            new OA\Property(property: 'variety_id', type: 'integer', nullable: true, example: 1),
                            new OA\Property(property: 'category_id', type: 'integer', nullable: true, example: 2),
                            new OA\Property(property: 'announcement_id', type: 'integer', nullable: true, example: 3),
                            new OA\Property(property: 'is_available', type: 'boolean', example: false),
                            new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Updated burger option'),
                            new OA\Property(property: 'sku', type: 'string', nullable: true, example: 'BUR-001-UPD'),
                            new OA\Property(property: 'created_by', type: 'integer', nullable: true, example: 1),
                            new OA\Property(property: 'updated_by', type: 'integer', nullable: true, example: 1),
                            new OA\Property(property: 'created_at', type: 'string', example: '2026-06-05 19:23:24'),
                            new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-05 19:30:00')
                        ]
                    )
                ]
            )
        ),
        new OA\Response(response: 400, description: 'Product not found'),
        new OA\Response(response: 422, description: 'Validation error'),
        new OA\Response(response: 401, description: 'Unauthenticated')
    ]
)]
class ProductUpdate {}
