<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class LicenseController extends Controller
{
  public function create()
  {
    return Inertia::render("ACP/Licenses/Create");
  }

  public function store()
  {
    $attributes = Request::validate([
      "label" => ["required", "max:255"],
      "slug" => ["required", "max:255"],
      "visible" => ["required", "boolean"],
    ]);

    License::create($attributes);

    return Redirect::route("acp.licenses")->with("success", "Licencia creada.");
  }

  public function edit(License $license)
  { 
    return Inertia::render("ACP/Licenses/Edit", [
      "license" => $license,
    ]);
  }

  public function update(License $license)
  { 
    $attributes = Request::validate([
      "label" => ["required", "max:255"],
      "slug" => ["required", "max:255"],
      "visible" => ["required", "boolean"],
    ]);

    $license->update($attributes);

    return Redirect::back()->with("success", "Licencia actualizada.");
  }

  public function destroy(License $license)
  { 
    $license->delete();

    return Redirect::back()->with("success", "Licencia eliminada.");
  }
}