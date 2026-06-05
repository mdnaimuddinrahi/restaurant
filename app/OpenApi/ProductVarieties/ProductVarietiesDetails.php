<?php

namespace App\OpenApi\ProductVarieties;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/product-varieties/{id}',
    tags: ['Product Varieties'],
    summary: 'Get Product Variety by ID',
    description: 'Returns a single product variety details',
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
    responses: [
        new OA\Response(
            response: 200,
            description: 'Product variety fetched successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'message',
                        type: 'string',
                        example: 'Product Variety retrieved successfully'
                    ),
                    new OA\Property(
                        property: 'data',
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
                ]
            )
        ),
        new OA\Response(response: 404, description: 'Product variety not found'),
        new OA\Response(response: 401, description: 'Unauthenticated')
    ]
)]
class ProductVarietiesDetails {}
