<?php

namespace Tests\Feature;

use App\Http\Requests\StoreProductCategoriesRequest;
use App\Http\Requests\UpdateProductCategoriesRequest;
use Tests\TestCase;

class ProductCategoriesRequestValidationTest extends TestCase
{
    public function test_store_product_categories_request_authorizes_and_validates_expected_fields(): void
    {
        $request = new StoreProductCategoriesRequest();

        $this->assertTrue($request->authorize());

        $rules = $request->rules();

        $this->assertArrayHasKey('name', $rules);
        $this->assertArrayHasKey('slug', $rules);
        $this->assertArrayHasKey('status', $rules);
        $this->assertArrayHasKey('image', $rules);
        $this->assertArrayHasKey('description', $rules);
    }

    public function test_update_product_categories_request_authorizes_and_validates_expected_fields(): void
    {
        $request = new UpdateProductCategoriesRequest();

        $this->assertTrue($request->authorize());

        $rules = $request->rules();

        $this->assertArrayHasKey('name', $rules);
        $this->assertArrayHasKey('slug', $rules);
        $this->assertArrayHasKey('status', $rules);
        $this->assertArrayHasKey('image', $rules);
        $this->assertArrayHasKey('description', $rules);
    }
}
