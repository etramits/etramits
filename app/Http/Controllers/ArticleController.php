<?php

namespace App\Http\Controllers;

// Models
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

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
        'slug' => $article->slug,
        'author_id' => $article->author_id,
        'slug' => $article->slug,
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

    $comments = Comment::where('article_id', $article['id'])
      ->where('active', 1)
      ->orderBy('id', 'DESC')
      ->with('user')
      ->get()
      ->map(fn ($comment) => [
        'id' => $comment->id,
        'user_id' => $comment->user_id,
        'user_name' => $comment->user->name,
        'user_role' => $comment->user->role,
        'article_id' => $comment->article_id,
        'content' => $comment->content,
        'active' => $comment->active
      ]);

    return Inertia::render('Article', [
      'article' => $article,
      'comments' => $comments,
    ]);
  }

  public function create()
  {
    $categories = Category::where('active', true)
      ->get()
      ->map(fn ($category) => [
        'id' => $category->id,
        'name' => $category->name,
      ]);
    
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
      $images = [];
    }

    return Inertia::render('Articles/Edit', [
      'article' => [
        'id' => $article->id,
        'title' => $article->title,
        'slug' => $article->slug,
        'category' => $article->category_id,
        'content' => $article->content,
        'active' => $article->active,
      ],
      'categories' => $categories,
      'images' => $images,
    ]);
  }

  public function upload(Request $request, $id)
  {
    $image = $request->image;
    $image->move(public_path('articles/' . $id . '/images/'), $image->getClientOriginalName());
      
    return Redirect::route('articles.edit', $id)->with('success', 'Article updated.');
  }

  public function update(Request $request, $id)
  {
      $article = Article::find($id);

      $validated = $request->validate([
        'title' => 'required',
        'slug' => 'required',
        'category' => 'required|integer',
        'content' => 'required',
        'active' => 'required|boolean',
      ]);

      $article->update([
        'title' => $request->title,
        'slug' => $request->slug,
        'category_id' => $request->category,
        'content' => $request->content,
        'active' => $request->active,
      ]);
      
      return Redirect::route('articles.edit', $id)->with('success', "L'informació de l'article s'ha actualitzat correctament");
  }

  public function destroy(Request $request, Article $article)
  {
    $article = Article::where('id', $request->id)->first();
    $article->delete();

    return Redirect::route('articles')->with('success', 'User deleted.');
  }

  // public function restore(Article $article)
  // {
  //     $article->restore();

  //     return Redirect::back()->with('success', 'Article restored.');
  // }
}
