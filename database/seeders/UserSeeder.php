<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'username' => 'admin',
            'role_id' => 1, // Assuming the Admin role has an ID of 1
        ]);
        UserRole::create([
            'user_id' => 1,
            'role_id' => 1,
        ]);

        
        $names = [
            'John Smith', 'Emma Johnson', 'Michael Brown', 'Sophia Davis',
            'James Wilson', 'Olivia Taylor', 'William Anderson', 'Ava Thomas',
            'David Martinez', 'Isabella Garcia', 'Daniel Lee', 'Mia Harris',
            'Matthew Clark', 'Amelia Lewis', 'Joseph Walker', 'Charlotte Hall',
            'Andrew Allen', 'Harper Young', 'Joshua King', 'Evelyn Scott',
        ];

        $data = [];
        $userRoleData = [];

        foreach ($names as $index => $name) {

            $roleId = rand(2, 4); // only role 2-4 (NO admin)

            $data[] = [
                'name' => $name,
                'username' => strtolower(str_replace(' ', '_', $name)) . $index,
                'email' => strtolower(str_replace(' ', '.', $name)) . $index . '@example.com',

                'password' => Hash::make('12345678'),

                'role_id' => $roleId,

                'profile_img' => null,
                'remember_token' => null,

            ];

            $userRoleData[] = [
                'user_id' => $index + 2, // +2 because the first user is admin with ID 1
                'role_id' => $roleId,
            ];
        }

        User::insert($data);
        UserRole::insert($userRoleData);
    }
}
