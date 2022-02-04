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
use App\Models\Favorite;


class HomeController extends Controller
{
    public function index()
    {

      $categories = Category::where('active', 1)->get();

      $populars = Favorite::groupBy('article_id')
        ->select('article_id', Favorite::raw('count(*) as total'))
        ->limit(3)
        ->orderBy('total', 'DESC')
        ->get()
        ->map(fn ($popular) => [
          'id' => $popular->article->id,
          'title' => $popular->article->title,
          'slug' => $popular->article->slug,
          'category_slug' => $popular->article->category->slug,
          'author_id' => $popular->article->author_id,
          'counter' => $popular->total 
        ]);
      

      return Inertia::render('Public/Home', [
        'populars' => $populars,
        'categories' => $categories
      ]);
    }
    
}