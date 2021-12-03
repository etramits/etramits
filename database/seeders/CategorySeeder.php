<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Category::truncate();

        $categories =  [
            [
                'name' => 'Salut',
                'icon' => 'stethoscope',
                'position' => 1,
                'creator_id' => 1,
            ],
            [
                'name' => 'Ocupacio',
                'icon' => 'briefcase',
                'position' => 2,
                'creator_id' => 1,
            ],
            [
                'name' => 'Cites Prèvies',
                'icon' => 'receipt',
                'position' => 3,
                'creator_id' => 1,
            ],
            [
                'name' => 'Habitatge',
                'icon' => 'house-user',
                'position' => 4,
                'creator_id' => 1,
            ],
            [
                'name' => 'Consell Comarcal',
                'icon' => 'hands-helping',
                'position' => 5,
                'creator_id' => 1,
            ],
          ];

          Category::insert($categories);

    }
}
