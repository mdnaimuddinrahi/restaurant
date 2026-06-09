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
    'name',
    'code',
    'contact_person',
    'phone',
    'email',
    'website',
    'address',
    'city',
    'state',
    'country',
    'postal_code',
    'tax_number',
    'opening_balance',
    'is_active',
    'remarks',
])]
class GrocerySupplier extends Model
{
    use Blameable;

    public function getGrocerySuppliers(array $filters = []): Collection
    {
        $data = $this->query();

        return $data->get();
    }

    public function scopeById(Builder $query, int $id): Builder
    {
        return $query->whereKey($id);
    }

    public function findGrocerySupplier(int $modelId): ?Model
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
