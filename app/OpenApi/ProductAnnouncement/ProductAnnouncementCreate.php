<?php

namespace App\OpenApi\ProductAnnouncement;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/product-announcements',
    tags: ['Product Announcements'],
    summary: 'Create Product Announcement',
    description: 'Create a new product announcement',
    security: [
        ['bearerAuth' => []]
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['name', 'slug'],
            properties: [
                new OA\Property(property: 'name', type: 'string', example: 'New Product Launch'),
                new OA\Property(property: 'slug', type: 'string', example: 'new-product-launch'),
                new OA\Property(property: 'emoji', type: 'string', nullable: true, example: '🚀'),
                new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Exciting new products coming soon!'),
                new OA\Property(property: 'is_active', type: 'boolean', example: true)
            ]
        )
    ),
    responses: [
        new OA\Response(
            response: 201,
            description: 'Product announcement created successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'message', type: 'string', example: 'Product Announcement created successfully'),
                    new OA\Property(
                        property: 'data',
                        type: 'object',
                        properties: [
                            new OA\Property(property: 'id', type: 'integer', example: 1),
                            new OA\Property(property: 'name', type: 'string', example: 'New Product Launch'),
                            new OA\Property(property: 'slug', type: 'string', example: 'new-product-launch'),
                            new OA\Property(property: 'emoji', type: 'string', nullable: true, example: '🚀'),
                            new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Exciting new products coming soon!'),
                            new OA\Property(property: 'is_active', type: 'boolean', example: true),
                            new OA\Property(property: 'created_by', type: 'integer', nullable: true, example: 1),
                            new OA\Property(property: 'updated_by', type: 'integer', nullable: true, example: null),
                            new OA\Property(property: 'created_at', type: 'string', example: '2026-06-06 10:00:00'),
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
class ProductAnnouncementCreate {}
