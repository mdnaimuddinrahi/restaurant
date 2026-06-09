<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'created_by', 
    'updated_by',
    'grocery_purchase_id',
    'grocery_id',
    'grocery_unit_id',
    'quantity',
    'unit_price',
    'discount_amount',
    'tax_amount',
    'subtotal',
    'remarks',
])]
class GroceryPurchaseItem extends Model
{
    use Blameable;

    public function getGroceryPurchaseItems(array $filters = []): Collection
    {
        $data = $this->query();

        return $data->get();
    }

    public function scopeById(Builder $query, int $id): Builder
    {
        return $query->whereKey($id);
    }

    public function findGroceryPurchaseItem(int $modelId): ?Model
    {
        return $this->query()->byId($modelId)->first();
    }
    
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}
