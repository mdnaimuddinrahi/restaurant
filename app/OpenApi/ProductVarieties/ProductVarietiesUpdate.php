<?php

namespace App\OpenApi\ProductVarieties;

use OpenApi\Attributes as OA;

#[OA\Put(
    path: '/product-varieties/{id}',
    tags: ['Product Varieties'],
    summary: 'Update Product Variety',
    description: 'Update product variety by ID',
    security: [
        ['bearerAuth' => []]
    ],
    parameters: [
        new OA\Parameter(
            name: 'id',
            description: 'Product Variety ID',
            in: 'path',
            required: true,
            schema: new OA\Schema(type: 'integer', example: 1)
        )
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'name', type: 'string', example: 'Regular Updated'),
                new OA\Property(property: 'slug', type: 'string', example: 'regular-updated'),
                new OA\Property(property: 'category_id', type: 'integer', nullable: true, example: 1),
                new OA\Property(property: 'status', type: 'integer', example: 1),
                new OA\Property(property: 'image', type: 'string', nullable: true, example: 'varieties/regular-updated.png'),
                new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Updated variety option'),
                new OA\Property(property: 'sort_order', type: 'integer', example: 1)
            ]
        )
    ),
    responses: [
        new OA\Response(
            response: 200,
            description: 'Product variety updated successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Product Variety updated successfully'
                    ),
                    new OA\Property(
                        property: 'data',
                        type: 'object',
                        properties: [
                            new OA\Property(property: 'id', type: 'integer', example: 1),
                            new OA\Property(property: 'name', type: 'string', example: 'Regular Updated'),
                            new OA\Property(property: 'slug', type: 'string', example: 'regular-updated'),
                            new OA\Property(property: 'category_id', type: 'integer', nullable: true, example: 1),
                            new OA\Property(property: 'status', type: 'integer', example: 1),
                            new OA\Property(property: 'image', type: 'string', nullable: true, example: 'varieties/regular-updated.png'),
                            new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Updated variety option'),
                            new OA\Property(property: 'sort_order', type: 'integer', example: 1),
                            new OA\Property(property: 'created_by', type: 'integer', nullable: true, example: 1),
                            new OA\Property(property: 'created_at', type: 'string', example: '2026-06-05 19:23:24'),
                            new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-05 19:30:00')
                        ]
                    )
                ]
            )
        ),
        new OA\Response(response: 404, description: 'Product variety not found'),
        new OA\Response(response: 422, description: 'Validation error'),
        new OA\Response(response: 401, description: 'Unauthenticated')
    ]
)]
class ProductVarietiesUpdate {}
