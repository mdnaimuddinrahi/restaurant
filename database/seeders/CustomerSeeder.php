<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [];

        for ($i = 1; $i <= 20; $i++) {

            $data[] = [
                'name' => "Customer {$i}",

                'email' => "customer{$i}@gmail.com",

                'phone' => '017' . str_pad((string)$i, 8, '0', STR_PAD_LEFT),

                'password' => Hash::make('12345678'),

                'verified_at' => now(),

                'profile_img' => null,

                'status' => rand(0, 1),

                'created_by' => 1,
                'updated_by' => null,
            ];
        }

        Customer::insert($data);   
    }
}
