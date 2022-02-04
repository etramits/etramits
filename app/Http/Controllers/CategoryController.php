<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
  public function create()
  {
    return Inertia::render("ACP/Categories/Create", [
      "categories" => Category::where("active", true)->get(),
    ]);
  }

  public function store()
  {
    $attributes = Request::validate([
      "username" => ["required", "max:24"],
      "email" => ["required", "email"],
      "password" => ["required"],
    ]);

    Category::create($attributes);

    return Redirect::route("acp.categories")->with("success", "Categoria creada.");
  }

  public function edit(Category $category)
  { 
    return Inertia::render("ACP/Categories/Edit", [
      "category" => $category,
      "parent" => Category::where("id", $category->parent)->get(),
      "subcategories" => Category::where("parent", $category->id)->paginate(5),
      "categories" => Category::whereNull("parent")->get(),
    ]);
  }

  public function update(Category $category)
  { 
    $attributes = Request::validate([
      "name" => ["required", "max:32"],
      "slug" => ["required"],
      "icon" => ["required"],
      "description" => ["max:128", "nullable"],
      "parent" => ["integer", "nullable"],
      "active" => ["required", "boolean"],
    ]);

    $category->update($attributes);

    return Redirect::back()->with("success", "Categoria actualitzada.");
  }

  public function destroy(Category $category)
  { 
    $category->delete();

    return Redirect::route("acp.categories")->with("success", "Categoria eliminada.");
  }
}
