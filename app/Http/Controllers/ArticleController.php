<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Articles/Create');

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
            'slug' => ['required', 'max:200'],
            'category_id' => ['required','integer'],
            'author_id' => ['required', 'integer'],
            'content' => ['required'],
        ]);

        Article::create([
            'title' => Request::get('title'),
            'slug' => Request::get('slug'),
            'category_id' => Request::get('category_id'),
            'author_id' => Request::get('author_id'),
            'content' => Request::get('content'),
        ]);

        return Redirect::route('articles')->with('success', 'Article created.');
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
        return Inertia::render('Articles/Edit', [
            'article' => [
                'id' => $article->id,
                'title' => $article->title,
                'category_id' => $article->category_id,
                'slug' => $article->slug,
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
    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        $validator = Request::validate([
            'title' => ['required', 'max:200'],
            'slug' => ['required', 'max:200'],
            'category_id' => ['required','integer'],
            'author_id' => ['required', 'integer'],
            'content' => ['required'],
        ]);

        $article->update([
            'title' => Request::get('title'),
            'slug' => Request::get('slug'),
            'category_id' => Request::get('category_id'),
            'author_id' => Request::get('author_id'),
            'content' => Request::get('content'),
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
