<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;

// Models

use App\Models\Category;
use App\Models\Setting;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use App\Models\Favorite;



class HomeController extends Controller
{
    public function index()
    {

      $settings = Setting::first();

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
          'counter' => $popular->total,
          'readingTime' => $popular->article->readerTime($popular->article->content),
          'ncomments' => $popular->article->comments->count(),
          'nfavorites' => $popular->article->favorites->count(),
        ]);

      $countArticles = Article::count();
      $countComments = Comment::count();
      $countUsers = User::count();

      $stats = [
        [
          'id' => 1,
          'value' => $countArticles, 
          'label' => 'Tràmits'
        ],
        [
          'id' => 2,
          'value' => $countComments, 
          'label'=> 'Comentaris'
        ],
        [
          'id' => 3,
          'value' => $countUsers, 
          'label'=> 'Usuaris'
        ],
      ];

      return Inertia::render('Public/Home', [
        'populars' => $populars,
        'categories' => $categories,
        'stats' => $stats,
        'settings' => $settings,
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
      ]);
    }
    
}