<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use App\Models\Setting;
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
      "name" => ["required", "max:24"],
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

  public function view($slug)
  {
    $category = Category::where('slug', $slug)
      ->where('active', true)
      ->get()
      ->map(fn ($category) => [
        'id' => $category->id,
        'name' => $category->name,
        'description' => $category->descripton,
        'slug' => $category->slug,
      ])
      ->first();
    
    $articles = Article::where('category_id', $category['id'])
      ->where('active', true)
      ->get()
      ->map(fn ($article) => [
        'id' => $article->id,
        'title' => $article->title,
        'slug' => $article->slug,
        'cover' => file_exists(public_path('articles/' . $article->id . '/cover.jpg')),
        'readingTime' => $article->readerTime($article->content),
        'ncomments' => $article->comments->count(),
        'nfavorites' => $article->favorites->count(),
      ]);


    return Inertia::render('Public/Category', [
      'category' => $category,
      'articles' => $articles,
      'settings' => Setting::first(),
    ]);
  }
}
