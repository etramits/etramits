<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;

class CategoryController extends Controller
{
  public function index()
  {
    return Inertia::render('Category', [
      'categories' => Category::where('active', true)
        ->whereNotNull('parent')
        ->orderBy('position')
        ->get()
        ->map(fn ($category) => [
          'id' => $category->id,
          'name' => $category->name,
          'icon' => $category->icon,
        ])
    ]);
  }

  public function test($slug)
  {
    $category = Category::where('slug', $slug)
      ->where('active', true)
      ->get()
      ->map(fn ($category) => [
        'id' => $category->id,
        'name' => $category->name,
        'description' => $category->descripton
      ])
      ->first();

    return Inertia::render('Category', [
      'category' => $category,
      
      'subcategories' => Category::where('parent', $category['id'])
        ->where('active', true)
        ->orderBy('position')
        ->get()
        ->map(fn ($category) => [
          'id' => $category->id,
          'name' => $category->name,
          'icon' => $category->icon,
        ])
    ]);

    // return Inertia::render('Category', [
    //   'categories' => Category::where('active', true)
    //     ->whereNotNull('parent')
    //     ->orderBy('position')
    //     ->get()
    //     ->map(fn ($category) => [
    //       'id' => $category->id,
    //       'name' => $category->name,
    //       'icon' => $category->icon,
    //     ])
    // ]);
  }
}