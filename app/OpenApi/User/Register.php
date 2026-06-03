<?php

namespace App\OpenApi\User;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: "/register",
    tags: ["Authentication"],
    summary: "Register user",

    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ["name", "email", "password"],
            properties: [
                new OA\Property(property: "name", type: "string", example: "user1"),
                new OA\Property(property: "email", type: "string", example: "user1@gmail.com"),
                new OA\Property(property: "password", type: "string", example: "12345678")
            ]
        )
    ),

    responses: [
        new OA\Response(
            response: 201,
            description: "Success",
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "success", type: "boolean", example: true),
                    new OA\Property(property: "message", type: "string", example: "Registration successful"),
                    new OA\Property(property: "access_token", type: "string", example: "1|token123"),
                    new OA\Property(property: "token_type", type: "string", example: "Bearer")
                ]
            )
        ),

        new OA\Response(
            response: 422,
            description: "Validation error"
        )
    ]
)]
class Register {}