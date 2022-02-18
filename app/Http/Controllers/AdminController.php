<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Models\Comment;
use App\Models\Article;
use App\Models\Favorite;
use Illuminate\Support\Facades\Request; 
use App\Models\Setting;
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
        'percent' => $result = $totalComments != 0 ? round($validatedComments * 100 / $totalComments, 0, PHP_ROUND_HALF_EVEN) : 0,
        'label' => 'Comentaris Validats',
        'icon' => 'comments'
      ],
      [ // Active Articles
        'id' => 5,
        'value1' => $activesArticles,
        'value2' => $totalArticles,
        'percent' => $result = $totalComments != 0 ? round($activesArticles * 100 / $totalArticles, 0, PHP_ROUND_HALF_EVEN) : 0,
        'label' => 'Tràmits Actius',
        'icon' => 'file-alt'
      ],
      [ // Active Categories
        'id' => 6,
        'value1' => $activesCategories,
        'value2' => $totalCategories,
        'percent' => $result = $totalComments != 0 ? round($activesCategories * 100 / $totalCategories, 0, PHP_ROUND_HALF_EVEN) : 0,
        'label' => 'Categories Actives',
        'icon' => 'folder-open'
      ]
    ];


    $adminUsers = User::where('role_id', '!=' , 1)
      ->paginate(10, ["*"], "users")
      ->withQueryString()
      ->through(fn ($user) => [
        "id" => $user->id,
        "name" => $user->name,
        "email" => $user->email,
        "role" => $user->role->label,
        "verified" => $user->verified,
        "active" => $user->active,
        ]);

    $loadCategories = Category::paginate(10, ["*"], "categories")
      ->withQueryString()
      ->through(fn ($category) => [
        "id" => $category->id,
        "name" => $category->name,
        "numArticles" => $category->articles->count(),
        "percentage" => $result = $totalComments != 0 ? round($category->articles->count() * 100 / $totalArticles, 0, PHP_ROUND_HALF_EVEN) : 0,
        "active" => $category->active,
      ])
      ->sortByDesc('numArticles')
      ->values();


    return Inertia::render("ACP/Index", [
      'stats1' => $stats1,
      'users' => $adminUsers,
      'loadCategories' => $loadCategories
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
    $commentsValidated = Comment::query()
      ->where('active', 1)
      ->orderBy('id', 'DESC')
      ->paginate(10, ["*"], "validated")
      ->withQueryString()
      ->through(fn ($comment) => [
        "id" => $comment->id,
        "content" => $comment->content,
        "active" => $comment->active,
        "user" => $comment->user,
        "article" => $comment->article
      ]);

    $commentsNoValidated = Comment::query()
      ->where('active', 0)
      ->orderBy('id', 'DESC')
      ->paginate(15, ["*"], "noValidated")
      ->withQueryString()
      ->through(fn ($comment) => [
        "id" => $comment->id,
        "content" => $comment->content,
        "active" => $comment->active,
        "user" => $comment->user,
        "article" => $comment->article
      ]);

    return Inertia::render("ACP/Comments/Index", [
      "commentsValidated" => $commentsValidated,
      "commentsNoValidated" => $commentsNoValidated,
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

  public function settings()
  {
    return Inertia::render("ACP/Configuracio/Index", [
      "settings" => Setting::query()
    ]);
  }
}