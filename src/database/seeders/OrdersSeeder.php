<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Orders\Order::factory(5)->hasProducts()->create();
        \App\Models\Orders\Order::factory(5)->has(Models\Products\Product::factory(3))->create();
        \App\Models\Orders\Order::factory(5)->hasAttached(
            Models\Products\Product::factory(3),
            ['quantity' => 3]
        )->create();
    }
}
