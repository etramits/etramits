<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Favorite;
use App\Models\WebDesign;
use App\Models\Article;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Favorite::orderBy('id', 'DESC')
        ->where('user_id', Auth::user()->id)
        ->with('article')
        ->get()
        ->map(fn ($favorite) => [
            'id' => $favorite->id,
            'user_id' => $favorite->user_id,
            'article_id' => $favorite->article_id,
            'article_slug' => $favorite->article->slug,
            'article_title' => $favorite->article->title,
            'article_category' => $favorite->article->category->slug,
        ]);

        $webdesign = WebDesign::find(1)
            ->get()
            ->map(fn ($webdesign)=> [
                'main_color' => $webdesign->main_color,
                'font_family' => $webdesign->font_family,
            ])
            ->first();  

        return Inertia::render('Favorites', [
            "favorites" => $favorites,
            "webdesign" => $webdesign,           
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add($article_id)
    {
        Favorite::create([
            'user_id' => Auth::user()->id,
            'article_id' => $article_id
        ]);

        return Redirect::back()->with('success', 'Favorit eliminat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rem($article_id)
    {   
        $favorite = Favorite::where('article_id', $article_id)->where('user_id', Auth::user()->id)
            ->get()
            ->first();

        $favorite->delete();

        return Redirect::back()->with('success', 'Favorit eliminat');
    }

}
