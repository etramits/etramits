<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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


Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    //users

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

    //articles

    Route::get('dashboard/articles', [ArticleController::class, 'index'])
    ->name('articles');

    //categories

    Route::get('dashboard/categories', [CategoryController::class, 'index'])
    ->name('categories');

    Route::get('dashboard/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');

    Route::get('dashboard/categories/{category}/edit', [CategoryController::class, 'edit'])
    ->name('categories.edit');

    Route::get('dashboard/categories/{id}/delete', [CategoryController::class, 'destroy'])
    ->name('categories.destroy');

    Route::put('dashboard/categories/{id}', [CategoryController::class, 'update'])
    ->name('categories.update');

    Route::post('dashboard/categories', [CategoryController::class, 'store'])
    ->name('categories.store');
});
