<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use App\Models\WebDesign;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Categories/Index', [
            "categories" => Category::orderBy('id', 'DESC')
            ->get()
            ->map(fn ($category) => [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'icon' => $category->icon,
                'parent' => $category->parent,
                'position' => $category->position,
                'creator_id' => $category->creator_id,
                'active' => $category->active,
                'created_at' => date("Y-m-d",strtotime($category->created_at)),
            ])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Request::validate([
            'name' => ['required', 'max:50', Rule::unique('categories')],
        ]);

        $slug = Str::slug(Request::get('name'));

        Category::create([
            'name' => Request::get('name'),
            'slug' => $slug,
            'description' => Request::get('description'),
            'parent' => Request::get('parent'),
            'active' => Request::get('active'),
            'icon' => Request::get('icon'),
            'creator_id' => Auth::user()->id,
        ]);

        return Redirect::route('categories')->with('success', 'Category created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return Inertia::render('Categories/Edit', [
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'parent' => $category->parent,
                'active' => $category->active,
                'icon' => $category->icon,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $category = Category::find($id);

        Request::validate([
            'name' => ['required', 'max:50', Rule::unique('categories')->ignore($category->id)],
        ]);

        $slug = Str::slug(Request::get('name'));

        $category->update([
            'name' => Request::get('name'),
            'slug' => $slug,
            'description' => Request::get('description'),
            'parent' => Request::get('parent'),
            'active' => Request::get('active'),
            'icon' => Request::get('icon'),
        ]);

        return Redirect::route('categories')->with('success', 'Category created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $category = Category::where('id', Request::get('id'))->first();
        $category->delete();

        return Redirect::back()->with('success', 'User deleted.');
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

    $subcategories = Category::where('parent', $category['id'])
      ->where('active', true)
      ->orderBy('position')
      ->get()
      ->map(fn ($category) => [
        'id' => $category->id,
        'name' => $category->name,
        'icon' => $category->icon,
      ]);
    
    $articles = Article::where('category_id', $category['id'])
      ->where('active', true)
      ->get()
      ->map(fn ($article) => [
        'id' => $article->id,
        'title' => $article->title,
        'slug' => $article->slug,
        'cover' => file_exists(public_path('articles/' . $article->id . '/cover.jpg')),
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

    return Inertia::render('Category', [
      'category' => $category,
      'subcategories' => $subcategories,
      'articles' => $articles,
      'webdesign' => $webdesign,
    ]);
  }
}
