<?php

namespace App\Http\Controllers;

// Models
use App\Models\Article;
use App\Models\Category;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArticleController extends Controller
{
    public function index()
    {
        return Inertia::render('Articles/Index', [
            "articles" => Article::orderBy('id', 'DESC')
            ->get()
            ->map(fn ($article) => [
                'id' => $article->id,
                'title' => $article->title,
                'category_id' => $article->category_id,
                'author_id' => $article->author_id,
                'content' => $article->content,
            ])
        ]);
    }

  public function view($category_slug, $article_slug)
  {
    $category = Category::where('slug', $category_slug)
      ->where('active', true)
      ->get()
      ->map(fn ($category) => [
        'id' => $category->id,
      ])
      ->first();

    $article = Article::where('slug', $article_slug)
      ->where('active', true)
      ->where('category_id', $category['id'])
      ->get()
      ->map(fn ($article) => [
        'id' => $article->id,
        'title' => $article->title,
        'content' => $article->content,
      ])
      ->first();

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Request::validate([
            'title' => ['required', 'max:200'],
            'slug' => ['required', 'max:200'],
            'category_id' => ['required','integer'],
            'author_id' => ['required', 'integer'],
            'content' => ['required'],
        ]);

        Auth::user()->account->users()->create([
            'title' => Request::get('title'),
            'slug' => Request::get('slug'),
            'category_id' => Request::get('category_id'),
            'author_id' => Request::get('author_id'),
            'content' => Request::get('content'),
        ]);

    // return $categories;
    
    return Inertia::render('Articles/Create', [
      'categories' => $categories,
    ]);
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required',
      'category' => 'required|integer',
    ]);

    $article = Article::create([
      'title' => $request->title,
      'slug' => $request->slug,
      'category_id' => $request->category,
      'author_id' => 1,
      'content' => '',
      'active' => false,
    ]);

    return Redirect::route('articles.edit', $article['id'])->with('success', 'Article created');
  }

  public function edit(Article $article)
  {
    $categories = Category::where('active', true)
      ->get()
      ->map(fn ($category) => [
        'id' => $category->id,
        'name' => $category->name,
      ]);

    if (is_dir('articles/' . $article['id'] . '/images/'))
    {
      $images = scandir(public_path('articles/' . $article['id'] . '/images/'));
      array_shift($images);
      array_shift($images);
    }
    else
    {
        return Inertia::render('Articles/Edit', [
            'article' => [
                'id' => $article->id,
                'title' => $article->title,
                'category_id' => $article->category_id,
                'author_id' => $article->author_id,
                'content' => $article->content,
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
    public function update(Article $article)
    {
        Request::validate([
            'title' => ['required', 'max:200'],
            'slug' => ['required', 'max:200'],
            'category_id' => ['required','integer'],
            'author_id' => ['required', 'integer'],
            'content' => ['required'],
        ]);

        $article->update(Request::only('title', 'slug', 'category_id', 'author_id','content'));
        
        return Redirect::back()->with('success', 'Article updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
    
        $article->delete();

        return Redirect::back()->with('success', 'User deleted.');
    }

    return Redirect::route('articles')->with('success', 'User deleted.');
  }

  // public function restore(Article $article)
  // {
  //     $article->restore();

  //     return Redirect::back()->with('success', 'Article restored.');
  // }
}
