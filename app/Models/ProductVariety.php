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
class ProductVariety extends Model
{
    use Blameable;

    public function getProductVarieties(): Collection
    {
        return $this->query()->get();
    }

    public function scopeById(Builder $query, int $productVarietyId): Builder
    {
        return $query->where('id', $productVarietyId);
    }

    public function findProductVariety(int $productVarietyId): ?Model
    {
        return $this->query()->byId($productVarietyId)->first();
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}
