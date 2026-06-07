<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name', 'slug', 'description', 'emoji', 'is_active'
])]
class ProductAnnouncement extends Model
{
    use Blameable;

    public function getProductAnnouncements(array $filters = []): Collection
    {
        $productAnnouncements = $this->query();

        // if (!empty($filters['query'])) {
        //     $products->where('name', 'like', "%{$filters['query']}%");
        // }

        return $productAnnouncements->get();
    }

    public function scopeById(Builder $query, int $productAnnouncementId): Builder
    {
        return $query->where('id', $productAnnouncementId);
    }

    public function findProductAnnouncement(int $productAnnouncementId): ?Model
    {
        return $this->query()->byId($productAnnouncementId)->first();
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}
