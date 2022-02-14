<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Setting;
use App\Models\User;



class ProfileController extends Controller
{

    public function profile(User $user)
  { 
    $settings = Setting::first();
    
    return Inertia::render("Auth/Profile", [
      "user" => $user,
      'settings' => $settings

    ]);
  }

  public function update(User $user)
  { 
    $attributes = Request::validate([
        "username" => ["required", "max:24"],
        "email" => ["required", "email"],
        "password" => ["required", "confirmed", Password::min(8)],
      ]);
  
      $user->update($attributes);
  
      return Redirect::back()->with("success", "Usuari actualitzat.");
  }

}