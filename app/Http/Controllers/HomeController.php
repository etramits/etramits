<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

// Models

use App\Models\Category;
use App\Models\WebDesign;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {

      return Inertia::render('Public/Home', [
        
      ]);
    }
    
}