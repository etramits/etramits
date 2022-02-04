<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

// Models

use App\Models\Category;
use App\Models\Setting;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {

      $settings = Setting::first();

      //dd($settings);

      return Inertia::render('Public/Home', [
        "settings" => $settings
      ]);
    }
    
}