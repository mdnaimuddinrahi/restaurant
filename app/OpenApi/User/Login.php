<?php

namespace App\OpenApi\User;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: "/login",
    tags: ["Authentication"],
    summary: "Login user",

    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ["email", "password"],
            properties: [
                new OA\Property(
                    property: "email",
                    type: "string",
                    example: "user1@gmail.com"
                ),
                new OA\Property(
                    property: "password",
                    type: "string",
                    example: "12345678"
                )
            ]
        )
    ),

    responses: [
        new OA\Response(
            response: 200,
            description: "Login success",
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: "success",
                        type: "boolean",
                        example: true
                    ),
                    new OA\Property(
                        property: "access_token",
                        type: "string",
                        example: "1|token_here"
                    ),
                    new OA\Property(
                        property: "token_type",
                        type: "string",
                        example: "Bearer"
                    ),
                    new OA\Property(
                        property: "user",
                        type: "object",
                        properties: [
                            new OA\Property(property: "id", type: "integer", example: 1),
                            new OA\Property(property: "name", type: "string", example: "user1"),
                            new OA\Property(property: "email", type: "string", example: "user1@gmail.com")
                        ]
                    )
                ]
            )
        ),

        new OA\Response(
            response: 401,
            description: "Invalid credentials"
        )
    ]
)]
class Login {}