<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserProfileController;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//ACP
Route::middleware("editor")->group(function ()
{

  // ACP

  Route::get("acp", [AdminController::class, "index"])
    ->name("acp");


  // ACP > Tràmits

  Route::get("acp/tramits", [AdminController::class, "articles"])
    ->name("acp.apps");

  Route::get("acp/tramits/crear", [ArticleController::class, "create"])
    ->name("acp.tramits.create");

  Route::post("acp/tramits", [ArticleController::class, "store"])
    ->name("acp.tramits.store");

  Route::get("acp/tramits/{article}/editar", [ArticleController::class, "edit"])
    ->name("acp.tramits.edit");

  Route::put("acp/tramits/{article}", [ArticleController::class, "update"])
    ->name("acp.tramits.update");

  Route::delete("acp/tramits/{article}", [ArticleController::class, "destroy"])
    ->name("acp.tramits.destroy");


  // ACP > Categories

  Route::get("acp/categories", [AdminController::class, "categories"])
    ->name("acp.apps");

  Route::get("acp/categories/crear", [CategoryController::class, "create"])
    ->name("acp.categories.create");

  Route::post("acp/categories", [CategoryController::class, "store"])
    ->name("acp.categories.store");

  Route::get("acp/categories/{category}/editar", [CategoryController::class, "edit"])
    ->name("acp.categories.edit");

  Route::put("acp/categories/{category}", [CategoryController::class, "update"])
    ->name("acp.categories.update");

  Route::delete("acp/categories/{category}", [CategoryController::class, "destroy"])
    ->name("acp.categories.destroy");

  Route::middleware("moderator")->group(function () 
  {
    // ACP > Comentaris

    Route::get("acp/comentaris", [AdminController::class, "comments"])
    ->name("acp.comments");

    Route::get("/acp/comentaris/{id}/validate", [CommentController::class, "updateState"])
      ->name("acp.comments.validate");

    Route::delete('/deleteComment/{id}', [CommentController::class, 'destroy'])
    ->name('comment.destroy');


    // ACP > Usuaris

    Route::get("acp/usuaris", [AdminController::class, "users"])
    ->name("acp.users");

    Route::get("acp/usuaris/crear", [UserController::class, "create"])
    ->name("acp.users.create");

    Route::post("/acp/usuaris", [UserController::class, "store"])
    ->name("acp.users.store");

    Route::get("acp/usuaris/{user}/editar", [UserController::class, "edit"])
    ->name("acp.users.edit");

    Route::put("/acp/usuaris/{user}", [UserController::class, "update"])
    ->name("acp.users.update");

    Route::delete("/acp/usuaris/{user}", [UserController::class, "destroy"])
    ->name("acp.users.destroy");
  });
  
  Route::middleware("admin")->group(function () 
  {

    // ACP > Rols

    Route::get("acp/rols", [AdminController::class, "roles"])
    ->name("acp.roles");

    Route::get("acp/rols/crear", [RoleController::class, "create"])
    ->name("acp.roles.create");

    Route::post("/acp/rols", [RoleController::class, "store"])
    ->name("acp.roles.store");

    Route::get("acp/rols/{role}/editar", [RoleController::class, "edit"])
    ->name("acp.roles.edit");

    Route::put("/acp/rols/{role}", [RoleController::class, "update"])
    ->name("acp.roles.update");

    Route::delete("/acp/rols/{role}", [RoleController::class, "destroy"])
    ->name("acp.roles.destroy");

    // ACP > Configuració

    Route::get("acp/configuracio/", [SettingController::class, "edit"])
    ->name("acp.settings.edit");
  
    Route::put("/acp/configuracio/{setting}", [SettingController::class, "update"])
    ->name("acp.settings.update");
  });
 
});

// Favorites and comments
Route::middleware(['auth:sanctum'])->group(function () {
  // User profile
  Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    
  // Favorites
  Route::get('favorites/index', [FavoriteController::class, 'index'])
  ->name('favorites');

  Route::post('favorites/{article_id}/add', [FavoriteController::class, 'add'])
  ->name('favorite.add');

  Route::post('favorites/{article_id}/rem', [FavoriteController::class, 'rem'])
  ->name('favorite.rem');

  Route::delete('favorites', [FavoriteController::class, 'destroy'])
  ->name('favorites.destroy');

  //send comments
  Route::post('/newComment/{id}', [CommentController::class, 'store'])
  ->name('comment.store');
}); 

// Pàgina inicial
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Tràmit
Route::get('/{category}/{article}', [ArticleController::class, 'view'])
    ->name('article.view');

//show article test
Route::get('/article/show/{article}', [ArticleController::class, 'test'])
    ->name('article.show');

// Categories
Route::get('/{slug}', [CategoryController::class, 'view'])
    ->name('category.view');

// Fallback route
Route::fallback(function() {
    return route('/');
});
