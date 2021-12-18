<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
        'categories' => Category::where('active', true)
            ->where('parent', null)
            ->orderBy('position')
            ->get()
            ->map(fn ($category) => [
                'id' => $category->id,
                'name' => $category->name,
                'icon' => $category->icon,
            ])
        ]);
    }
}
