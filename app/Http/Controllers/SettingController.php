<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class SettingController extends Controller
{
    public function edit(Setting $setting)
    {

      return Inertia::render("ACP/Settings/Edit", [
        "setting" => [
            "header_text" => $setting->header_text,
            "header_img" => $setting->header_img,
            "main_color" => $setting->main_color,
            "logo_consellcomarcal" => $setting->logo_consellcomarcal
        ],
      ]);
    }
    
  
    public function update(Setting $setting)
    { 
      $attributes = Request::validate([
        "header_text" => ["required"],
        "header_img" => ["required"],
        "main_color" => ["required"],
        "logo_consellcomarcal" => ["required"],
      ]);
  
      $setting->update($attributes);
  
      return Redirect::route("acp.settings.edit", 1)->with("success", "Configuració actualitzada.");
    }
  
}
