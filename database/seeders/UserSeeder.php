<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'username' => 'admin',
            'role_id' => 1, // Assuming the Admin role has an ID of 1
        ]);
    }
}
