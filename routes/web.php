<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebDesignController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [HomeController::class, 'index']);


//  Admin Dashboard   
Route::middleware(['auth:sanctum', 'verified', 'admin', 'gestor'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard')->withoutMiddleware(['admin']);

    // Users

    Route::get('dashbo/salut/exampleard/users', [UserController::class, 'index'])
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

    Route::get('/{slug}', [CategoryController::class, 'index']);

    Route::get('/{category}/{article}', [ArticleController::class, 'view']);

    Route::get('/{slug}', [CategoryController::class, 'view'])
    ->name('category.view');

    //send comments
    Route::post('/{id}/comment', [CommentController::class, 'store'])
        ->name('comment.store');

    //view articles
    Route::get('/{category}/{article}', [ArticleController::class, 'view'])
        ->name('article.view');

    //view categories
    Route::get('/{slug}', [CategoryController::class, 'view'])
        ->name('category.view');
