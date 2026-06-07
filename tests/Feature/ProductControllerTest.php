<?php

namespace Tests\Feature;

use App\Http\Controllers\ProductController;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    public function test_index_returns_products_response(): void
    {
        $response = (new ProductController())->index();

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertSame('Products retrieved successfully', $response->getData(true)['message']);
    }

    public function test_store_product_request_uses_announcement_id_field(): void
    {
        $request = new StoreProductRequest();

        $this->assertTrue($request->authorize());
        $this->assertArrayHasKey('announcement_id', $request->rules());
        $this->assertArrayNotHasKey('product_announcement_id', $request->rules());
    }

    public function test_update_product_request_uses_announcement_id_field(): void
    {
        $request = new UpdateProductRequest();

        $this->assertTrue($request->authorize());
        $this->assertArrayHasKey('announcement_id', $request->rules());
        $this->assertArrayNotHasKey('product_announcement_id', $request->rules());
    }
}
