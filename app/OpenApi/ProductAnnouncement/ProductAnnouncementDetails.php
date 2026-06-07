<?php

namespace App\OpenApi\ProductAnnouncement;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/product-announcements/{productAnnouncement}',
    tags: ['Product Announcements'],
    summary: 'Get Product Announcement by ID',
    description: 'Returns a single product announcement details',
    security: [
        ['bearerAuth' => []]
    ],
    parameters: [
        new OA\Parameter(
            name: 'productAnnouncement',
            description: 'Product Announcement ID',
            in: 'path',
            required: true,
            schema: new OA\Schema(type: 'integer', example: 1)
        )
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Product announcement fetched successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'message', type: 'string', example: 'Product Announcement retrieved successfully'),
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
                            new OA\Property(property: 'updated_by', type: 'integer', nullable: true, example: 1),
                            new OA\Property(property: 'created_at', type: 'string', example: '2026-06-06 10:00:00'),
                            new OA\Property(property: 'updated_at', type: 'string', example: '2026-06-06 10:00:00')
                        ]
                    )
                ]
            )
        ),
        new OA\Response(response: 400, description: 'Product announcement not found'),
        new OA\Response(response: 401, description: 'Unauthenticated')
    ]
)]
class ProductAnnouncementDetails {}
