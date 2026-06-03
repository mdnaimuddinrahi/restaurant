<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    title: "Restaurant POS API",
    description: "Restaurant API Documentation"
)]
#[OA\Server(
    url: "http://restaurant.test/api",
    description: "Local server"
)]
#[OA\SecurityScheme(
    securityScheme: "bearerAuth",
    type: "http",
    scheme: "bearer",
    bearerFormat: "JWT"
)]
class Info {}