<?php

namespace App\Traits;

trait Filterable
{
    protected function isValidFilter(mixed $value): bool
    {
        if (is_string($value)) {
            $value = trim($value);
        }

        return !is_null($value)
            && $value !== ''
            && $value != -1;
    }
}
