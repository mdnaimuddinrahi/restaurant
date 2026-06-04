<?php

namespace Database\Seeders;

use App\Models\PermissionRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        // Role 1 (Admin) => all permissions
        foreach (range(1, 25) as $permissionId) {
            $data[] = [
                'permission_id' => $permissionId,
                'role_id' => 1,
                'created_by' => 1,
            ];
        }

        // Role 2 (Manager)
        foreach (range(1, 18) as $permissionId) {
            $data[] = [
                'permission_id' => $permissionId,
                'role_id' => 2,
                'created_by' => 1,
            ];
        }

        // Role 3 (Cashier)
        foreach (range(1, 10) as $permissionId) {
            $data[] = [
                'permission_id' => $permissionId,
                'role_id' => 3,
                'created_by' => 1,
            ];
        }

        // Role 4 (Staff)
        foreach (range(1, 5) as $permissionId) {
            $data[] = [
                'permission_id' => $permissionId,
                'role_id' => 4,
                'created_by' => 1,
            ];
        }

        PermissionRole::insert($data);
    }
}
