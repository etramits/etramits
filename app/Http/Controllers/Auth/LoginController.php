<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Setting;


class LoginController extends Controller
{
  public function create()
  {
    $settings = Setting::first();

    return Inertia::render("Auth/Login", [
      'settings' => $settings,
    ]);
  }

  public function store(Request $request)
  {
    $credentials = $request->validate([
      "email" => ["required", "email"],
      "password" => ["required"],
    ]);

    if (Auth::attempt($credentials))
    {
      $request->session()->regenerate();

      return redirect()->intended();
    }

    return back()->withErrors([
      "email" => "Las credenciales son erróneas",
    ]);
  }
}