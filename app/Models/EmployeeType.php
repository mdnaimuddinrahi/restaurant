<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'code', 'description', 'is_active', 'shift_start', 'shift_end', 'working_hours', 'created_by', 'updated_by'])]
class EmployeeType extends Model
{
    use Blameable;

    public function getEmployeeTypes(): Collection
    {
        return $this->query()->get();
    }

    public function scopeById(Builder $query, int $employeeTypeId): Builder
    {
        return $query->where('id', $employeeTypeId);
    }

    public function findEmployeeType(int $employeeTypeId): ?Model
    {
        return $this->query()->byId($employeeTypeId)->first();
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }

}
