<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;

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

Route::get('/article', [ArticleController::class, 'index']);

Route::get('/{slug}', [CategoryController::class, 'index']);


Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/dashboard', function () {
  return Inertia::render('Dashboard');
})->name('dashboard');
