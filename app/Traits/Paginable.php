<?php

namespace App\Traits;

use App\Utils\DefaultValue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

trait Paginable
{
    public function scopeGetOrPaginate(Builder $query, array $filter): Collection|LengthAwarePaginator
    {
        $columns = $filter['columns'] ?? DefaultValue::DATABASE_COLUMNS;
        
        if (!empty($filter['paginate'])) {
            return $query->paginate($filter['per_page'], $columns, $filter['page_name'], $filter['page'], $filter['total']);
        }

        return $query->get($columns);
    }
}
