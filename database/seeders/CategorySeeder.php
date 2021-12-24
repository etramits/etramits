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
        'slug' => 'salut',
        'icon' => 'stethoscope',
        'parent' => null,
        'position' => 1,
        'creator_id' => 1,
        'created_at' => now()
      ],
      [
        'name' => 'Ocupacio',
        'slug' => 'ocupacio',
        'icon' => 'briefcase',
        'parent' => null,
        'position' => 2,
        'creator_id' => 1,
        'created_at' => now()
      ],
      [
        'name' => 'Cites Prèvies',
        'slug' => 'cites-previes',
        'icon' => 'receipt',
        'parent' => null,
        'position' => 3,
        'creator_id' => 1,
        'created_at' => now()
      ],
      [
        'name' => 'Habitatge',
        'slug' => 'habitatge',
        'icon' => 'house-user',
        'parent' => null,
        'position' => 4,
        'creator_id' => 1,
        'created_at' => now()
      ],
      [
        'name' => 'Consell Comarcal',
        'slug' => 'consell-comarcal',
        'icon' => 'hands-helping',
        'parent' => null,
        'position' => 5,
        'creator_id' => 1,
        'created_at' => now()
      ],
      [
        'name' => 'COVID-19',
        'slug' => 'covid-19',
        'icon' => 'virus',
        'parent' => 1,
        'position' => 1,
        'creator_id' => 1,
        'created_at' => now()
      ],
    ];

    Category::insert($categories);
  }
}
