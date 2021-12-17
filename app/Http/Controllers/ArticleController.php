<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class ArticleController extends Controller
{
  public function index()
  {
    return Inertia::render('Article');
  }
}