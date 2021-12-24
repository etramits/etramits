<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index() {
        $countArticles = Article::count();
        $countComments = Comment::count();
        $countUsers = User::count();
        $countCategories = Category::count();

        $stats = [
            [
                'icon' => 'file-alt',
                'value' => $countArticles, 
                'label' => 'Tràmits'
            ],
            [
                'icon' => 'user-edit',
                'value' => $countComments, 
                'label'=> 'Comentaris'
            ],
            [
                'icon' => 'users',
                'value' => $countUsers, 
                'label'=> 'Usuaris'
            ],
            [
                'icon' => 'folder-open',
                'value' => $countCategories, 
                'label'=> 'Categories'
            ],
        ];

        return Inertia::render('Dashboard', [
            'stats' => $stats
        ]);
    }
}