<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models;

class ProductIdentifierTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'imei',
            'serial'
        ];

        foreach ($types as $type) {
            Models\Products\IdentifierType::firstOrCreate([
                'name' => $type
            ]);
        }
    }
}
