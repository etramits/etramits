<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Models\Comment;
use App\Models\Article;
use App\Models\Favorite;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
  public function index()
  {

    $totalComments = Comment::count();
    $validatedComments = Comment::where('active', 1)->count();
    $totalArticles = Article::count();
    $activesArticles = Article::where('active', 1)->count();
    $totalCategories = Category::count();
    $activesCategories = Category::where('active', 1)->count();

    $stats1 = [
      [ // Validated Comments
        'id' => 4,
        'value1' => $validatedComments,
        'value2' => $totalComments,
        'label' => 'Comentaris Validats',
        'icon' => 'comments'
      ],
      [ // Active Articles
        'id' => 5,
        'value1' => $activesArticles,
        'value2' => $totalArticles,
        'label' => 'Tràmits Actius',
        'icon' => 'file-alt'
      ],
      [ // Active Categories
        'id' => 6,
        'value1' => $activesCategories,
        'value2' => $activesCategories,
        'label' => 'Categories Actives',
        'icon' => 'folder-open'
      ]
    ];

    return Inertia::render("ACP/Index", [
      'stats1' => $stats1
    ]);
  }

  public function articles()
  {
    return Inertia::render("ACP/Articles/Index", [
      "categories" => Category::query()
        ->when(Request::input("search"), function ($query, $search) {
          $query->where("title", "like", "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString(),

      "filters" => Request::only(["search"])
    ]);
  }

  public function categories()
  {
    return Inertia::render("ACP/Categories/Index", [
      "categories" => Category::query()
        ->when(Request::input("search"), function ($query, $search) {
          $query->where("id", "like", "%{$search}%");
          $query->orWhere("name", "like", "%{$search}%");
          $query->orwhere("slug", "like", "%{$search}%");
          $query->orwhere("icon", "like", "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString(),

      "filters" => Request::only(["search"])
    ]);
  }

  public function comments()
  {
    return Inertia::render("ACP/Comments/Index", [
      "comments" => Comment::query()
        ->when(Request::input("search"), function ($query, $search) {
          $query->where("content", "like", "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString()
        ->through(fn ($comment) => [
          "id" => $comment->id,
          "content" => $comment->content,
          "active" => $comment->active,
          "user" => $comment->user,
          "article" => $comment->article
        ]),

      "filters" => Request::only(["search"])
    ]);
  }

  public function users()
  {
    return Inertia::render("ACP/Users/Index", [
      "users" => User::query()
        ->when(Request::input("search"), function ($query, $search) {
          $query->where("username", "like", "%{$search}%");
          $query->orwhere("email", "like", "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString()
        ->through(fn ($user) => [
          "id" => $user->id,
          "username" => $user->username,
          "email" => $user->email,
          "role" => $user->role ? $user->role->only("label") : null,
          "verified" => $user->verified,
          "active" => $user->active,
      ]),
      
      "filters" => Request::only(["search"])
    ]);

    return Inertia::render("ACP/Users");
  }

  public function roles()
  {
    return Inertia::render("ACP/Roles/Index", [
      "roles" => Role::query()
        ->when(Request::input("search"), function ($query, $search) {
          $query->where("label", "like", "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString(),

      "filters" => Request::only(["search"])
    ]);
  }
}