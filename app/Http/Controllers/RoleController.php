<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
  public function create()
  {
    return Inertia::render("ACP/Roles/Create");
  }

  public function store()
  {
    $attributes = Request::validate([
      "label" => ["required", "max:255"],
      "acronym" => ["required", "max:255"],
      "visible" => ["required", "boolean"],
    ]);

    $attributes["acronym"] = strtoupper($attributes["acronym"]);

    Role::create($attributes);

    return Redirect::route("acp.roles")->with("success", "Rol creado.");
  }

  public function edit(Role $role)
  {
    return Inertia::render("ACP/Roles/Edit", [
      "role" => [
        "id" => $role->id,
        "label" => $role->label,
        "acronym" => $role->acronym,
        "visible" => $role->visible,
        "users" => $role->users()->paginate(5),
      ],
    ]);
  }

  public function update(Role $role)
  { 
    $attributes = Request::validate([
      "label" => ["required", "max:255"],
      "acronym" => ["required", "max:255"],
      "visible" => ["required", "boolean"],
    ]);

    $role->update($attributes);

    return Redirect::back()->with("success", "Rol actualizado.");
  }

  public function destroy(Role $role)
  {
    $role->delete();

    return Redirect::route("acp.roles")->with("success", "Rol eliminado.");
  }
}