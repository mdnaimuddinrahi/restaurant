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
])]
class GroceryStockLedger extends Model
{
    use Blameable;

    public const REF_PURCHASE = 'purchase';
    public const REF_SALE = 'sale';
    public const REF_WASTAGE = 'wastage';
    public const REF_ADJUSTMENT = 'adjustment';
    public const REF_RETURN = 'return';
    public const REF_TRANSFER = 'transfer';
    public const TYPE_IN = 1;
    public const TYPE_OUT = 2;
    public const TYPE_ADJUSTMENT = 3;

    public function getGroceryStockLedgers(array $filters = []): Collection
    {
        $data = $this->query();

        return $data->get();
    }

    public function scopeById(Builder $query, int $id): Builder
    {
        return $query->whereKey($id);
    }

    public function findGroceryStockLedger(int $modelId): ?Model
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
