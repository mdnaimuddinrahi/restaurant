<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[Fillable([
    'created_by', 
    'updated_by',
    'name',
    'email',
    'phone',
    'password',
    'verified_at',
    'profile_img',
    'status',
])]
#[Hidden(['password', 'remember_token'])]
class Customer extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, Blameable;

    public function getCustomers(array $filters = []): Collection
    {
        $data = $this->query();

        return $data->get();
    }
    
    public function scopeById(Builder $query, int $id): Builder
    {
        return $query->whereKey($id);
    }
    
    public function scopeByEmail(Builder $query, string $email): Builder
    {
        return $query->where('email', $email);
    }
     
    public function findCustomer(array $filters = []): ?Model
    {
        return $this->query()
                    ->when(
                        !empty($filters['email']),
                        fn (Builder $query) => $query->byEmail($filters['email'])
                    )
                    ->when(
                        !empty($filters['id']),
                        fn (Builder $query) => $query->byId($filters['id'])
                    )
                    ->first();
    }
    
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}
