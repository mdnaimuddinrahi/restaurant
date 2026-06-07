<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

#[Fillable([
    'name',
    'type',
    'slug',
    'video_link',
    'image',
    'is_publishable',
    'is_active',
    'description',
    'meta_title',
    'meta_keywords',
    'meta_description',
    'created_by',
    'updated_by',
])]
class ProductRecipe extends Model
{
    use Blameable;

    public function getProductRecipes(array $filters = []): Collection
    {
        $productRecipes = $this->query();

        return $productRecipes->get();
    }

    public function scopeById(Builder $query, int $productRecipeId): Builder
    {
        return $query->where('id', $productRecipeId);
    }

    public function findProductRecipe(int $productRecipeId): ?Model
    {
        return $this->query()->byId($productRecipeId)->first();
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}
