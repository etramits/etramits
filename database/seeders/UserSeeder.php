<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  public function run()
  {
    DB::table('users')->insert([
      "name" => "obech",
      "email" => "obech@cendrassos.net",
      "password" => Hash::make("obech"),
      "role_id" => 4,
    ]);
    
    DB::table('users')->insert([
      "name" => "apons",
      "email" => "apons@cendrassos.net",
      "password" => Hash::make("apons"),
      "role_id" => 4,
    ]);

    DB::table('users')->insert([
      "name" => "aramon",
      "email" => "aramon@cendrassos.net",
      "password" => Hash::make("aramon"),
      "role_id" => 4,
    ]);

    DB::table('users')->insert([
      "name" => "xvallejo",
      "email" => "xvallejo@cendrassos.net",
      "password" => Hash::make("xvallejo"),
      "role_id" => 4,
    ]);

    DB::table('users')->insert([
      "name" => "dprados",
      "email" => "dprados@cendrassos.net",
      "password" => Hash::make("dprados"),
      "role_id" => 4,
    ]);

    DB::table('users')->insert([
      "name" => "usuari",
      "email" => "usuari@etramits.cat",
      "password" => Hash::make("usuari"),
      "role_id" => 1,
    ]);

    DB::table('users')->insert([
      "name" => "editor",
      "email" => "editor@etramits.cat",
      "password" => Hash::make("editor"),
      "role_id" => 2,
    ]);

    DB::table('users')->insert([
      "name" => "moderador",
      "email" => "moderador@etramits.cat",
      "password" => Hash::make("moderador"),
      "role_id" => 3,
    ]);

    DB::table('users')->insert([
      "name" => "administrador",
      "email" => "administrador@etramits.cat",
      "password" => Hash::make("administrador"),
      "role_id" => 4,
    ]);
  }
}