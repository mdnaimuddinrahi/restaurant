<?php

namespace Database\Seeders;

use App\Models\CustomerInfo;
use Illuminate\Database\Seeder;

class CustomerInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {

            CustomerInfo::create([
                'customer_id' => null,

                'name' => "Customer {$i}",

                'email' => "customer{$i}@gmail.com",

                'phone' => '017' . str_pad($i, 8, '0', STR_PAD_LEFT),

                'address' => "House {$i}, Main Road",

                'city' => 'Dhaka',

                'state' => 'Dhaka',

                'country' => 'Bangladesh',

                'postal_code' => '1207',

                'customer_level' => rand(0, 2),

                'total_spent' => rand(1000, 100000),

                'total_orders' => rand(1, 200),

                'reward_points' => rand(0, 1000),

                'is_blocked' => 0,

                'meta' => [
                    'preferred_payment_method' => 'cash',
                    'favorite_food' => 'Pizza',
                ],

                'created_by' => 1,
            ]);
        }
    }
}
