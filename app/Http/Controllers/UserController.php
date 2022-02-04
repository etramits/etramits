<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class UserController extends Controller
{
  public function create()
  {
    return Inertia::render("ACP/Users/Create", [
      "roles" => Role::where("visible", true)->get(),
    ]);
  }

  public function store()
  {
    $attributes = Request::validate([
      "username" => ["required", "max:24"],
      "email" => ["required", "email"],
      "password" => ["required"],
    ]);

    User::create($attributes);

    return Redirect::route("acp.users")->with("success", "Usuari creat.");
  }

  public function edit(User $user)
  { 
    return Inertia::render("ACP/Users/Edit", [
      "user" => $user,
      "roles" => Role::where("visible", true)->get(),
    ]);
  }

  public function update(User $user)
  { 
    $attributes = Request::validate([
      "username" => ["required", "max:255"],
      "email" => ["required", "email"],
      "role_id" => ["required", "integer"],
      "verified" => ["required", "boolean"],
      "active" => ["required", "boolean"],
    ]);

    $user->update($attributes);

    return Redirect::back()->with("success", "Usuari actualitzat.");
  }

  public function destroy(User $user)
  { 
    $user->delete();

    return Redirect::route("acp.users")->with("success", "Usuari eliminat.");
  }
}
