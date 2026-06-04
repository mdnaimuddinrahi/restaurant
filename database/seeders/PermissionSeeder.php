<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $config = config('permissions');

        $permissions = collect($config)
                        ->flatten(1) // 🔥 key step: flatten nested arrays
                        ->map(function ($item) {
                            return [
                                'group_id' => $item['group_id'] ?? 0,
                                'group_name' => $item['group_name'] ?? null,
                                'name' => $item['name'],
                                'slug' => $item['slug'],
                            ];
                        })
                        ->values()
                        ->toArray();

        Permission::upsert(
            $permissions,
            ['slug'],
            ['name']
        );
    }
}
