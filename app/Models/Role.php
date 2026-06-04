<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name', 'status'])]
class Role extends Model
{
    use Blameable;

    public const int STATUS_ACTIVE = 1;
    public const int STATUS_INACTIVE = 0;

    public function scopeNotAdmin(Builder $query): Builder
    {
        return $query->where('id', '!=', 1);
    }

    public function scopeStatus(Builder $query, int $status): Builder
    {
        return $query->where('status', $status);
    }

    public function scopeById(Builder $query, int $id): Builder
    {
        return $query->where('id', $id);
    }

    public function getRoles(): Collection
    {
        return $this->query()->notAdmin()->get();
    }

    public function findRole(int $id): ?Model
    {
        return $this->query()
                    ->notAdmin()
                    ->byId($id)
                    ->first();
    }

    public function newRole(string $name, int $status = self::STATUS_INACTIVE): Model
    {
        return $this->query()->create([
            'name' => $name,
            'status' => $status
        ]);
    }

    public function getCreatedAtAttribute(string $value): string
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute(string $value): string
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getStatusAttribute(int $value): string
    {
        return $value === self::STATUS_ACTIVE ? 'assigned' : 'not assigned';
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }

    public static function checkStatus(self $role, int $status): bool
    {
        return $role->getRawOriginal('status') == $status;
    }
}
