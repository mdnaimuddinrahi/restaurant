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
    'purchase_no',
    'supplier_id',
    'invoice_no',
    'purchase_date',
    'subtotal_amount',
    'discount_amount',
    'tax_amount',
    'shipping_cost',
    'total_amount',
    'paid_amount',
    'due_amount',
    'status',
    'payment_status',
    'remarks',
])]
class GroceryPurchase extends Model
{
    use Blameable;

    public function getGroceryPurchases(array $filters = []): Collection
    {
        $data = $this->query();

        return $data->get();
    }

    public function scopeById(Builder $query, int $id): Builder
    {
        return $query->whereKey($id);
    }

    public function findGroceryPurchase(int $modelId): ?Model
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
