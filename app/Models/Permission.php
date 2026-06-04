<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\WithoutTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[WithoutTimestamps(false)]

class Permission extends Model
{
    public $timestamps = false;
    
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function getPermissions(): array
    {
        return $this->query()->get()->toArray();
    }
}
