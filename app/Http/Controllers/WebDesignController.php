<?php

namespace App\Http\Controllers;

use App\Models\WebDesign;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class WebDesignController extends Controller
{
    public function index()
    {
        $webdesign = Webdesign::find(1);

        return Inertia::render('WebDesign/Index', [
            'id' => $webdesign->id,
            'main_color' => $webdesign->main_color,
            'font_family' => $webdesign->font_family,
            'like_button' => $webdesign->like_button,
            'header_text' => $webdesign->header_text,
            'header_img' => $webdesign->header_img            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('WebDesign/Create');

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
            'main_color' => ['required', 'max:20'],
            'font_family' => ['required', 'max:30'],
            'like_button' => ['required', 'max:30'],
            'header_text' => ['required', 'max:40'],
            'header_img' => ['required', 'max:20'],
        ]);

        WebDesign::create([
            'main_color' => Request::get('main_color'),
            'font_family' => Request::get('font_family'),
            'like_button' => Request::get('like_button'),
            'font_family' => Request::get('font_family'),
            'header_text' => Request::get('header_text'),
            'header_img' => Request::get('header_img'),
        ]);

        return Redirect::route('webdesign.edit', 1)->with('success', 'WebDesign created.');
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
    public function edit(WebDesign $webdesign)
    {
        return Inertia::render('WebDesign/Edit', [
            'webdesign' => [
                'id' => $webdesign->id,
                'main_color' => $webdesign->main_color,
                'font_family' => $webdesign->font_family,
                'like_button' => $webdesign->like_button,
                'header_text' => $webdesign->header_text,
                'header_img' => $webdesign->header_img,
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
        $webdesign = Webdesign::find($id);

        error_log(123); 
        error_log(Request::get('main_color')); 

        $validator = Request::validate([
            'main_color' => ['required', 'max:20'],
            'font_family' => ['required', 'max:30'],
            'like_button' => ['required', 'max:30'],
            'header_text' => ['required', 'max:40'],
            'header_img' => ['required', 'max:20'],
        ]);

        $webdesign->update([
            'main_color' => Request::get('main_color'),
            'font_family' => Request::get('font_family'),
            'like_button' => Request::get('like_button'),
            'font_family' => Request::get('font_family'),
            'header_text' => Request::get('header_text'),
            'header_img' => Request::get('header_img'),
        ]);
        
        return Redirect::route('webdesign.edit', 1)->with('success', 'Webdesign updated.');
    }

}
