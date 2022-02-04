<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
  public function run()
  {
    Category::create([
      "name" => "Salut",
      "slug" => "salut",
      "icon" => "stethoscope",
      "description" => null,
      "parent" => null,
      "user_id" => 1,
      "active" => true,
    ]);
    
    Category::create([
      "name" => "Ocupacio",
      "slug" => "ocupacio",
      "icon" => "briefcase",
      "description" => null,
      "parent" => null,
      "user_id" => 2,
      "active" => true,
    ]);

    Category::create([
      "name" => "Cites Prèvies",
      "slug" => "cites-previes",
      "icon" => "receipt",
      "description" => null,
      "parent" => null,
      "user_id" => 3,
      "active" => true,
    ]);

    Category::create([
      "name" => "Habitatge",
      "slug" => "habitatge",
      "icon" => "house-user",
      "description" => null,
      "parent" => null,
      "user_id" => 1,
      "active" => true,
    ]);

    Category::create([
      "name" => "Consell Comarcal",
      "slug" => "consell-comarcal",
      "icon" => "hands-helping",
      "description" => null,
      "parent" => null,
      "user_id" => 2,
      "active" => true,
    ]);

    Category::create([
      "name" => "COVID-19",
      "slug" => "covid-19",
      "icon" => "receipt",
      "description" => null,
      "parent" => 1,
      "user_id" => 3,
      "active" => true,
    ]);
  }
}