<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            "header_text" => "Consulta els teus tràmits en dos clics",
            "header_img" => "slogan1.svg",
            "main_color" => "#FDE047",
            "logo_consellcomarcal" => "logo.png"
          ]);
    }
}
