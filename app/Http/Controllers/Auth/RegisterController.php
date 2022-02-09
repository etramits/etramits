<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Validation\Rules\Password;



class RegisterController extends Controller
{
  public function create()
  {
    $settings = Setting::first();

    return Inertia::render("Auth/Register", [
      'settings' => $settings,
    ]);
  }

  public function store(Request $request)
  {
    $attributes = $request->validate([
      "username" => ["required", "max:24"],
      "email" => ["required", "email"],
      "password" => ["required", "confirmed", Password::min(8)],
    ]);

    User::create($attributes);

    return Redirect::route("home")->with("success", "Usuari creat.");
  }
}