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

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Inertia::render('Favorites', [
            "favorites" => Favorite::orderBy('id', 'DESC')
            ->get()
            ->map(fn ($favorite) => [
                'id' => $favorite->id,
                'user_id' => $favorite->user_id,
                'article_id' => $favorite->article_id,
            ]),

            "webdesign" => WebDesign::find(1)
            ->get()
            ->map(fn ($webdesign)=> [
                'main_color' => $webdesign->main_color,
                'font_family' => $webdesign->font_family,
                'like_button' => $webdesign->like_button,
                'header_text' => $webdesign->header_text,
                'header_img' => $webdesign->header_img 
            ])->first()
        
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
    public function store()
    {
        Request::validate([
            'user_id' => ['required', 'max:200'],
            'article_id' => ['required', 'max:200'],
        ]);

        Auth::user()->account->users()->create([
            'user_id' => Request::get('user_id'),
            'article_id' => Request::get('article_id'),
        ]);

        return Redirect::route('favorites')->with('success', 'Guardat a favorits');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($favorite)
    {
        $favorite->delete();

        return Redirect::back()->with('success', 'Favorit eliminat');
    }

}
