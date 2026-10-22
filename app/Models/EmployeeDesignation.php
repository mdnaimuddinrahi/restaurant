<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'description', 'status', 'created_by', 'updated_by'])]
class EmployeeDesignation extends Model
{
    use Blameable;

    public function getEmployeeDesignations(array $filters = []): Collection
    {
        return $this->query()
                    ->selectedColumns($filters['selected_columns'] ?? [])
                    ->status($filters['status'] ?? null)
                    ->get();
    }

    public function scopeStatus(Builder $query, ?bool $status): Builder
    {
        return !empty($status) ? $query->where('status', $status) : $query;
    }

    public function scopeSelectedColumns(Builder $query, array $selectedColumns = []): Builder
    {
        return !empty($selectedColumns) ? $query->select($selectedColumns) : $query;
    }

    public function scopeById(Builder $query, int $employeeDesignationId): Builder
    {
        return $query->where('id', $employeeDesignationId);
    }

    public function findEmployeeDesignation(int $employeeDesignationId): ?Model
    {
        return $this->query()->byId($employeeDesignationId)->first();
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}
