<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebDesign;

class WebDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
  {   
    WebDesign::truncate();

    WebDesign::insert([
        'main_color' => 'yellow',
        'font_family' => 'font-sans',
        'like_button' => 'bookmark',
        'header_text' => 'Consulta tràmits en dos clics',
        'header_img' => 'slogan1.svg',
    ]);
  }
}
