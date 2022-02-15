<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  public function run()
  {
    User::create([
      "name" => "obech",
      "email" => "obech@cendrassos.net",
      "password" => Hash::make("obech"),
      "role_id" => 4,
    ]);
    
    User::create([
      "name" => "apons",
      "email" => "apons@cendrassos.net",
      "password" => Hash::make("apons"),
      "role_id" => 4,
    ]);

    User::create([
      "name" => "aramon",
      "email" => "aramon@cendrassos.net",
      "password" => Hash::make("aramon"),
      "role_id" => 4,
    ]);

    User::create([
      "name" => "xvallejo",
      "email" => "xvallejo@cendrassos.net",
      "password" => Hash::make("xvallejo"),
      "role_id" => 4,
    ]);

    User::create([
      "name" => "dprados",
      "email" => "dprados@cendrassos.net",
      "password" => Hash::make("dprados"),
      "role_id" => 4,
    ]);

    User::create([
      "name" => "usuari",
      "email" => "usuari@etramits.cat",
      "password" => Hash::make("usuari"),
      "role_id" => 1,
    ]);

    User::create([
      "name" => "editor",
      "email" => "editor@etramits.cat",
      "password" => Hash::make("editor"),
      "role_id" => 2,
    ]);

    User::create([
      "name" => "moderador",
      "email" => "moderador@etramits.cat",
      "password" => Hash::make("moderador"),
      "role_id" => 3,
    ]);

    User::create([
      "name" => "administrador",
      "email" => "administrador@etramits.cat",
      "password" => Hash::make("administrador"),
      "role_id" => 4,
    ]);
  }
}