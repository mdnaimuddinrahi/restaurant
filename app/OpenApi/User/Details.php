<?php

namespace App\OpenApi\User;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: "/me",
    tags: ["User Details"],
    summary: "Get logged-in user",

    security: [
        ["bearerAuth" => []]
    ],

    responses: [
        new OA\Response(
            response: 200,
            description: "User data",
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: "id",
                        type: "integer",
                        example: 1
                    ),
                    new OA\Property(
                        property: "name",
                        type: "string",
                        example: "user1"
                    ),
                    new OA\Property(
                        property: "email",
                        type: "string",
                        example: "user1@gmail.com"
                    )
                ]
            )
        ),

        new OA\Response(
            response: 401,
            description: "Unauthenticated"
        )
    ]
)]
class Details {}