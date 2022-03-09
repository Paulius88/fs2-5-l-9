<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Mobilieji telefonai',
            'Išmanieji laikrodžiai',
            'Planšetiniai kompiuteriai'
        ];

        foreach ($categories as $category) {
            // if (!Models\Products\Category::where('name', $category)->exists()) {
            //     Models\Products\Category::create([
            //         'is_active' => TRUE,
            //         'name' => $category
            //     ]);
            // }
            
            Models\Products\Category::firstOrCreate([
                'name' => $category
            ], [
                'is_active' => rand(0,1)
            ]);
        }
    }
}
