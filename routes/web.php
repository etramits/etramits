<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('dashboard/articles', [ArticleController::class, 'index'])
    ->name('articles')
    ->middleware(['auth:sanctum', 'verified', 'admin']);

Route::get('dashboard/articles/create', [ArticleController::class, 'create'])
    ->name('articles.create');

Route::get('dashboard/articles/edit', [ArticleController::class, 'edit'])
    ->name('articles.edit');

Route::get('dashboard/articles/delete', [ArticleController::class, 'destroy'])
    ->name('articles.delete');

Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

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

    Route::get('dashboard/articles', [ArticleController::class, 'index'])
    ->name('articles');
});
