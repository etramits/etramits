<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
  public function index()
  {

    $countArticles = Article::count();
    $countComments = Comment::count();
    $countUsers = User::count();
    $totalComments = Comment::count();
    $validatedComments = Comment::where('active', 1)->count();
    $totalArticles = Article::count();
    $activesArticles = Article::where('active')->count();
    $totalCategories = Category::count();
    $activesCategories = Category::where('active', 1)->count();

    $stats = [
      [ // Total Articles
        'id' => 1,
        'value1' => $countArticles, 
        'label' => 'Tràmits'
      ],
      [ //Total comments
        'id' => 2,
        'value1' => $countComments, 
        'label'=> 'Comentaris'
      ],
      [ // Total users
        'id' => 3,
        'value1' => $countUsers, 
        'label'=> 'Usuaris'
      ],
      [ // Validated Comments
        'id' => 4,
        'value1' => $validatedComments,
        'value2' => $totalComments,
        'label' => 'Comentaris Validats'
      ],
      [ // Active Articles
        'id' => 5,
        'value1' => $activesArticles,
        'value2' => $totalArticles,
        'label' => 'Tràmits Actius'
      ],
      [ // Active Categories
        'id' => 6,
        'value1' => $activesCategories,
        'value2' => $activesCategories,
        'label' => 'Categories Actives'
      ]
    ];

    return Inertia::render("ACP/Index");
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