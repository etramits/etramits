<?php

namespace App\Http\Controllers;

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
    $settings = Setting::first(['header_img', 'header_text', 'main_color']);
    $categories = Category::where('parent', null)->where('active', 1)->get(['id', 'name', 'slug', 'icon']);

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
        'reading' => $popular->article->readerTime($popular->article->content),
        'comments' => $popular->article->comments->count(),
        'favorites' => $popular->article->favorites->count(),
      ]);

    $stats = [
      [
        'id' => 1,
        'label' => 'Categories',
        'value' => Category::count(), 
      ],
      [
        'id' => 2,
        'value' => Article::count(), 
        'label' => 'Tràmits'
      ],
      [
        'id' => 3,
        'value' => Comment::count(), 
        'label'=> 'Comentaris'
      ],
      [
        'id' => 4,
        'value' => User::count(), 
        'label'=> 'Usuaris'
      ],
    ];

    return Inertia::render('Public/Home', [
      'populars' => $populars,
      'categories' => $categories,
      'stats' => $stats,
      'settings' => $settings,
    ]);
  }
}
