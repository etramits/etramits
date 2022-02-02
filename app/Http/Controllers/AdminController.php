<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\Role;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
  public function index()
  {
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
          $query->where("label", "like", "%{$search}%");
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
        ->withQueryString(),

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