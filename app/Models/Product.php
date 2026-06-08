<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'name', 'slug', 'image', 'price', 'variety_id', 'category_id', 'announcement_id', 'is_available', 'description', 'sku', 'created_by', 'updated_by'
])]
class Product extends Model
{
    use Blameable;

    public function getProducts(array $filters = []): Collection
    {
        $products = $this->query();

        return $products->get();
    }

    public function scopeById(Builder $query, int $productId): Builder
    {
        return $query->where('id', $productId);
    }

    public function findProduct(int $productId): ?Model
    {
        return $this->query()->byId($productId)->first();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategories::class, 'category_id', 'id');
    }

    public function variety(): BelongsTo
    {
        return $this->belongsTo(ProductVariety::class, 'variety_id', 'id');
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}
