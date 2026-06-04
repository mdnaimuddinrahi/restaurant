<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\WithoutTimestamps;
use Illuminate\Database\Eloquent\Model;

#[WithoutTimestamps(false)]
class Permission extends Model
{
    public $timestamps = false;
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
