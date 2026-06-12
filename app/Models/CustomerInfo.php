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
    'customer_id',
    'name',
    'email',
    'phone',
    'address',
    'city',
    'state',
    'country',
    'postal_code',
    'customer_level',
    'total_spent',
    'total_orders',
    'reward_points',
    'is_blocked',
    'meta',
])]
class CustomerInfo extends Model
{
    use Blameable;

    public function getCustomerInfos(array $filters = []): Collection
    {
        $data = $this->query();

        return $data->get();
    }

    public function scopeById(Builder $query, int $id): Builder
    {
        return $query->whereKey($id);
    }

    public function findCustomerInfo(int $modelId): ?Model
    {
        return $this->query()->byId($modelId)->first();
    }
    
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
            'meta' => 'array',
            'total_spent' => 'decimal:2',
        ];
    }
}
