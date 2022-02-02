<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

// Models

use App\Models\Category;
use App\Models\WebDesign;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {

      $category = Category::where('active', true)
        ->where('parent', null)
        ->orderBy('position')
        ->get()
        ->map(fn ($category) => [
            'id' => $category->id,
            'name' => $category->name,
            'icon' => $category->icon,
            'slug' => $category->slug,
      ]);

      return Inertia::render('Home', [
        'categories' => $category
      ]);
    }
    
}