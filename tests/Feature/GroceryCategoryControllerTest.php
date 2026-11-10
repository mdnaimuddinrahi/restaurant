<?php

namespace Tests\Feature;

use App\Models\GroceryCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GroceryCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_grocery_category_api_requires_authentication(): void
    {
        $this->getJson('/api/grocery-categories')->assertUnauthorized();
    }

    public function test_index_returns_all_grocery_categories(): void
    {
        $this->authenticate();
        $this->createCategory(['name' => 'Produce', 'slug' => 'produce']);
        $this->createCategory(['name' => 'Dry Goods', 'slug' => 'dry-goods']);

        $this->getJson('/api/grocery-categories')
            ->assertOk()
            ->assertJsonPath('message', 'Grocery Category list retrieved successfully.')
            ->assertJsonCount(2, 'data');
    }

    public function test_store_creates_a_grocery_category(): void
    {
        $this->authenticate();

        $this->postJson('/api/grocery-categories', $this->categoryPayload())
            ->assertCreated()
            ->assertJsonPath('message', 'Grocery Category created successfully.')
            ->assertJsonPath('data.name', 'Baking Supplies')
            ->assertJsonPath('data.slug', 'baking-supplies')
            ->assertJsonPath('data.code', 'BAKE');

        $this->assertDatabaseHas('grocery_categories', [
            'name' => 'Baking Supplies',
            'slug' => 'baking-supplies',
            'code' => 'BAKE',
            'sort_order' => 2,
        ]);
    }

    public function test_store_validates_required_and_unique_fields(): void
    {
        $this->authenticate();
        $this->createCategory(['name' => 'Produce', 'slug' => 'produce']);

        $this->postJson('/api/grocery-categories', [
            'name' => 'Produce',
            'slug' => 'produce',
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'slug']);

        $this->postJson('/api/grocery-categories', [])->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'slug']);
    }

    public function test_show_returns_a_category_or_not_found(): void
    {
        $this->authenticate();
        $category = $this->createCategory();

        $this->getJson('/api/grocery-categories/'.$category->id)
            ->assertOk()
            ->assertJsonPath('message', 'Grocery Category retrieved successfully.')
            ->assertJsonPath('data.id', $category->id)
            ->assertJsonPath('data.name', $category->name);

        $this->getJson('/api/grocery-categories/999999')
            ->assertStatus(400)
            ->assertJsonPath('message', 'No Grocery Category found.');
    }

    public function test_update_changes_a_category_and_returns_the_updated_record(): void
    {
        $this->authenticate();
        $category = $this->createCategory();

        $this->putJson('/api/grocery-categories/'.$category->id, [
            'name' => $category->name,
            'slug' => $category->slug,
            'code' => 'UPDATED',
            'description' => 'Updated description',
            'sort_order' => 5,
        ])
            ->assertOk()
            ->assertJsonPath('message', 'Grocery Category updated successfully.')
            ->assertJsonPath('data.id', $category->id)
            ->assertJsonPath('data.code', 'UPDATED')
            ->assertJsonPath('data.description', 'Updated description');

        $this->assertDatabaseHas('grocery_categories', [
            'id' => $category->id,
            'code' => 'UPDATED',
            'description' => 'Updated description',
            'sort_order' => 5,
        ]);
    }

    public function test_update_validates_unique_fields(): void
    {
        $this->authenticate();
        $category = $this->createCategory(['name' => 'Produce', 'slug' => 'produce']);
        $this->createCategory(['name' => 'Dairy', 'slug' => 'dairy']);

        $this->putJson('/api/grocery-categories/'.$category->id, [
            'name' => 'Dairy',
            'slug' => 'dairy',
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'slug']);
    }

    public function test_destroy_deletes_a_category_or_returns_not_found(): void
    {
        $this->authenticate();
        $category = $this->createCategory();

        $this->deleteJson('/api/grocery-categories/'.$category->id)
            ->assertOk()
            ->assertJsonPath('message', 'Grocery Category deleted successfully.');

        $this->assertDatabaseMissing('grocery_categories', ['id' => $category->id]);

        $this->deleteJson('/api/grocery-categories/999999')
            ->assertStatus(400)
            ->assertJsonPath('message', 'No Grocery Category found.');
    }

    private function authenticate(): void
    {
        $user = User::create([
            'name' => 'Grocery Category Tester',
            'username' => 'grocery-category-tester',
            'email' => 'grocery-category-tester@example.com',
            'password' => 'password',
            'role_id' => 2,
        ]);

        $this->actingAs($user, 'sanctum');
    }

    private function categoryPayload(): array
    {
        return [
            'name' => 'Baking Supplies',
            'slug' => 'baking-supplies',
            'code' => 'BAKE',
            'description' => 'Flour, sugar, and baking essentials.',
            'is_active' => true,
            'sort_order' => 2,
            'image' => 'categories/baking-supplies.png',
        ];
    }

    private function createCategory(array $overrides = []): GroceryCategory
    {
        return GroceryCategory::create(array_merge([
            'name' => 'Test Category',
            'slug' => 'test-category',
            'code' => 'TEST',
            'description' => 'Category used by feature tests.',
            'status' => 1,
            'sort_order' => 0,
            'image' => null,
        ], $overrides));
    }
}
