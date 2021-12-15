<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\HomeController;
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

    Route::delete('dashboard/users/{user}/delete', [UserController::class, 'destroy'])
    ->name('users.delete');

    Route::put('dashboard/users/{user}', [UserController::class, 'update'])
    ->name('users.update');

    Route::post('dashboard/users', [UserController::class, 'store'])
    ->name('users.store');
});