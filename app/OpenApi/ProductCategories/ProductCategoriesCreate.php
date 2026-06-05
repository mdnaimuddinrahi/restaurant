<?php

namespace App\OpenApi\ProductCategories;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/product-categories',
    tags: ['Product Categories'],
    summary: 'Create Product Category',
    description: 'Create a new product category',

    security: [
        ['bearerAuth' => []]
    ],

    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['name'],
            properties: [
                new OA\Property(
                    property: 'name',
                    type: 'string',
                    example: 'Beverages'
                ),
                new OA\Property(
                    property: 'description',
                    type: 'string',
                    nullable: true,
                    example: 'All types of beverages and drinks'
                ),
                new OA\Property(
                    property: 'status',
                    type: 'string',
                    example: 'active'
                )
            ]
        )
    ),

    responses: [
        new OA\Response(
            response: 201,
            description: 'Product category created successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Product category created'
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
            response: 422,
            description: 'Validation error'
        ),

        new OA\Response(
            response: 401,
            description: 'Unauthenticated'
        )
    ]
)]
class ProductCategoriesCreate {}
