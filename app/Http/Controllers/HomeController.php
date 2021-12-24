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

      $webdesign = WebDesign::find(1)
        ->get()
        ->map(fn ($wd) => [
            'main_color' => $wd->main_color,
            'font_family' => $wd->font_family,
            'like_button' => $wd->like_button,
            'header_text' => $wd->header_text,
            'header_img' => $wd->header_img 
        ])->first();
      
      $countArticles = Article::count();
      $countComments = Comment::count();
      $countUsers = User::count();

      $stats = [
        [
          'value' => $countArticles, 
          'label' => 'Tràmits'
        ],
        [
          'value' => $countComments, 
          'label'=> 'Comentaris'
        ],
        [
          'value' => $countUsers, 
          'label'=> 'Usuaris'
        ],
      ];

      return Inertia::render('Home', [
        'categories' => $category,
        'webdesign' => $webdesign,
        'stats' => $stats
      ]);
    }
    
}
