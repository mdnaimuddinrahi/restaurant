<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    public function scopeSearch(
        Builder $query,
        ?string $searchTerm,
        string $searchFields
    ): Builder {
        if (!$this->isValidFilter($searchTerm)) {
            return $query;
        }

        return $query->where(function (Builder $q) use ($searchTerm, $searchFields) {

            foreach (explode(',', $searchFields) as $field) {
                $q->orWhere(trim($field), 'LIKE', "%{$searchTerm}%");
            }

        });
    }
}