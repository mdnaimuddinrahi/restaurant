<?php

namespace App\OpenApi\ProductAnnouncement;

use OpenApi\Attributes as OA;

#[OA\Delete(
    path: '/product-announcements/{productAnnouncement}',
    tags: ['Product Announcements'],
    summary: 'Delete Product Announcement',
    description: 'Delete a product announcement by ID',
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
            description: 'Product announcement deleted successfully',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'message', type: 'string', example: 'Product Announcement deleted successfully')
                ]
            )
        ),
        new OA\Response(
            response: 400,
            description: 'Product announcement not found',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'message', type: 'string', example: 'No Product Announcement found')
                ]
            )
        ),
        new OA\Response(response: 401, description: 'Unauthenticated')
    ]
)]
class ProductAnnouncementDelete {}
