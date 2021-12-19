<?php

namespace App\Http\Controllers;

// Models
use App\Models\Article;
use App\Models\Category;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
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

      return Inertia::render('Article', [
        'article' => $article,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::where('active', true)
        ->get()
        ->map(fn ($category) => [
          'id' => $category->id,
          'name' => $category->name,
        ]);

      // return $categories;
      
      return Inertia::render('Articles/Create', [
        'categories' => $categories,
      ]);
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
        'title' => ['required', 'max:200'],
        // 'slug' => ['required', 'max:200'],
        'category' => ['required', 'integer'],
      ]);

      $article = Article::create([
        'title' => Request::get('title'),
        'slug' => 'asd',
        'category_id' => Request::get('category'),
        'author_id' => 1,
        'content' => '',
        'active' => false,
      ]);

      return Redirect::route('articles.edit', [$article['id']])->with('success', 'Article created');
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
    public function edit(Article $article)
    {
      $categories = Category::where('active', true)
        ->get()
        ->map(fn ($category) => [
          'id' => $category->id,
          'name' => $category->name,
        ]);

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
      ]);
    }

    public function upload(Request $request, $id)
    {
      Request::file('image')->move('images');
      
      // if (Request::hasFile('image'))
      // {
      //   return 'Yes';
      // }  
      // else
      // {
      //   return 'No';
      // }

      // return Request::get('image');
        
        // ->move(public_path('images'), 'seo.jpeg');
        // Request::get('image')->store('images');
        // $request->file('image')->move(public_path('images'), 'seo.jpeg');

        // $picture = Request::file('image');

        // $picture->move(public_path('images'), 'seo.jpeg');

        // return 'Fet';

        // if ($request->hasFile('image'))
        // {
        //   return 'Yes';
        // }
        // else
        // {
        //   return 'No';
        // }

        // return Request::get('image');


        // $validator = Request::validate([
        //     'title' => ['required', 'max:200'],
        //     'slug' => ['required', 'max:200'],
        //     'category_id' => ['required','integer'],
        //     'author_id' => ['required', 'integer'],
        //     'content' => ['required'],
        //     'active' => ['required','boolean'],
        // ]);

        // $article->update([
        //     'title' => Request::get('title'),
        //     'slug' => Request::get('slug'),
        //     'category_id' => Request::get('category_id'),
        //     'author_id' => Request::get('author_id'),
        //     'content' => Request::get('content'),
        //     'active' => Request::get('active'),
        // ]);

        
        return Redirect::route('articles')->with('success', 'Article updated.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        // Request::get('image')->move(public_path('images'), 'seo.jpeg');
        // Request::get('image')->store('images');

        return Request::get('image');


        $validator = Request::validate([
            'title' => ['required', 'max:200'],
            'slug' => ['required', 'max:200'],
            'category_id' => ['required','integer'],
            'author_id' => ['required', 'integer'],
            'content' => ['required'],
            'active' => ['required','boolean'],
        ]);

        $article->update([
            'title' => Request::get('title'),
            'slug' => Request::get('slug'),
            'category_id' => Request::get('category_id'),
            'author_id' => Request::get('author_id'),
            'content' => Request::get('content'),
            'active' => Request::get('active'),
        ]);

        
        return Redirect::route('articles')->with('success', 'Article updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article = Article::where('id', Request::get('id'))->first();
        $article->delete();

        return Redirect::route('articles')->with('success', 'User deleted.');
    }

    public function restore(Article $article)
    {
        $article->restore();

        return Redirect::back()->with('success', 'Article restored.');
    }
}
