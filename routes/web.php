<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\WebDesignController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public 

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


//  Admin Dashboard   

Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Users

    Route::get('dashboard/users', [UserController::class, 'index'])
        ->name('users');

    Route::get('dashboard/users/create', [UserController::class, 'create'])
      ->name('users.create');

    Route::get('dashboard/users/{user}/edit', [UserController::class, 'edit'])
        ->name('users.edit');

    Route::delete('dashboard/users/{id}/delete', [UserController::class, 'destroy'])
        ->name('users.destroy');

    Route::put('dashboard/users/{id}', [UserController::class, 'update'])
        ->name('users.update');

    Route::post('dashboard/users', [UserController::class, 'store'])
        ->name('users.store');

    // Articles

    Route::get('dashboard/articles', [ArticleController::class, 'index'])
        ->name('articles')->withoutMiddleware(['admin']);;

    Route::get('dashboard/articles/create', [ArticleController::class, 'create'])
        ->name('articles.create')->withoutMiddleware(['admin']);;

    Route::get('dashboard/articles/{article}/edit', [ArticleController::class, 'edit'])
        ->name('articles.edit')->withoutMiddleware(['admin']);;

    Route::delete('dashboard/articles/{id}/delete', [ArticleController::class, 'destroy'])
        ->name('articles.destroy')->withoutMiddleware(['admin']);;

    Route::put('dashboard/articles/{id}', [ArticleController::class, 'upload'])
      ->name('articles.upload')->withoutMiddleware(['admin']);;

    Route::put('dashboard/articles/{id}/upload', [ArticleController::class, 'update'])
        ->name('articles.update')->withoutMiddleware(['admin']);;

    Route::post('dashboard/articles', [ArticleController::class, 'store'])
        ->name('articles.store')->withoutMiddleware(['admin']);;

    // WebDesign

    Route::get('dashboard/webdesign/', [WebDesignController::class, 'index'])
        ->name('webdesign');

    Route::get('dashboard/webdesign/{webdesign}/edit', [WebDesignController::class, 'edit'])
        ->name('webdesign.edit');

    Route::put('dashboard/webdesign/{id}', [WebDesignController::class, 'update'])
        ->name('webdesign.update');

    // Categories

    Route::get('dashboard/categories', [CategoryController::class, 'index'])
        ->name('categories');

    Route::get('dashboard/categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::get('dashboard/categories/{category}/edit', [CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::delete('dashboard/categories/{id}/delete', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');

    Route::put('dashboard/categories/{id}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::post('dashboard/categories', [CategoryController::class, 'store'])
        ->name('categories.store');
    
    // Webdesign

    Route::post('dashboard/webdesign', [WebDesignController::class, 'store'])
        ->name('webdesign.store');

    //Comments

    Route::get('dashboard/comments', [CommentController::class, 'index'])
    ->name('comments');

    Route::get('dashboard/comments/{id}/update', [CommentController::class, 'update'])
    ->name('comment.update');

    Route::delete('dashboard/comments/{id}/delete', [CommentController::class, 'destroy'])
    ->name('comment.destroy');
        
});

Route::middleware(['auth:sanctum'])->group(function () {
    // Favorites
    Route::get('favorites/list', [FavoriteController::class, 'index'])
    ->name('favorites');

    Route::post('favorites/{article_id}/add', [FavoriteController::class, 'add'])
    ->name('favorite.add');

    Route::post('favorites/{article_id}/rem', [FavoriteController::class, 'rem'])
    ->name('favorite.rem');

    Route::delete('favorites', [FavoriteController::class, 'destroy'])
    ->name('favorites.destroy');

    //send comments
    Route::post('/{id}/comment', [CommentController::class, 'store'])
    ->name('comment.store');
}); 



//view articles
Route::get('/{category}/{article}', [ArticleController::class, 'view'])
    ->name('article.view');

//view categories
Route::get('/{slug}', [CategoryController::class, 'view'])
    ->name('category.view');

// Fallback route
Route::fallback(function() {
    return route();
});
