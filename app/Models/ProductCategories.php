<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name', 'slug', 'status', 'image', 'description', 'created_by', 'updated_by'
])]
class ProductCategories extends Model
{
    use Blameable;

    public function getProductCategories(): Collection
    {
        return $this->query()->get();
    }

    public function scopeById(Builder $query, int $productCategoryId): Builder
    {
        return $query->where('id', $productCategoryId);
    }

    public function findProductCategory(int $productCategoryId): ?Model
    {
        return $this->query()->byId($productCategoryId)->first();
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}
