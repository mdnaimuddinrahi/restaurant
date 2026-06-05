<?php

namespace App\OpenApi\ProductCategories;

use OpenApi\Attributes as OA;

#[OA\Put(
    path: '/product-categories/{id}',
    tags: ['Product Categories'],
    summary: 'Update Product Category',
    description: 'Update product category by ID',

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

    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: 'name',
                    type: 'string',
                    example: 'Beverages Updated'
                ),
                new OA\Property(
                    property: 'description',
                    type: 'string',
                    nullable: true,
                    example: 'All types of beverages and drinks updated'
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
            response: 200,
            description: 'Product category updated successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Product category updated successfully'
                    ),
                    new OA\Property(
                        property: 'data',
                        type: 'object',
                        properties: [
                            new OA\Property(property: 'id', type: 'integer', example: 1),
                            new OA\Property(property: 'name', type: 'string', example: 'Beverages Updated'),
                            new OA\Property(property: 'description', type: 'string', nullable: true, example: 'All types of beverages and drinks updated'),
                            new OA\Property(property: 'status', type: 'string', example: 'active'),
                            new OA\Property(property: 'created_by', type: 'integer', example: 1),
                            new OA\Property(property: 'created_at', type: 'string', example: '2026-06-05 19:23:24'),
                            new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-05 19:30:00')
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
            response: 422,
            description: 'Validation error'
        ),

        new OA\Response(
            response: 401,
            description: 'Unauthenticated'
        )
    ]
)]
class ProductCategoriesUpdate {}
