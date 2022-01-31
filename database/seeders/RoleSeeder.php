<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  public function run()
  {
    Role::create([
      "id" => 1,
      "label" => "Usuari",
      "acronym" => "USER",
      "visible" => true,
    ]);

    Role::create([
      "id" => 2,
      "label" => "Editor",
      "acronym" => "EDITOR",
      "visible" => true,
    ]);

    Role::create([
      "id" => 3,
      "label" => "Moderador",
      "acronym" => "MOD",
      "visible" => true,
    ]);

    Role::create([
      "id" => 4,
      "label" => "Administrador",
      "acronym" => "ADMIN",
      "visible" => true,
    ]);
  }
}