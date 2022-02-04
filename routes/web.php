<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/**
 * Controllers
**/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\RoleController;
<<<<<<< HEAD
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\WebDesignController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;

/*
 * Public
 */

Route::get("", [HomeController::class, "index"])
  ->name("home");
  
/*
 * Login
 */
=======
use App\Http\Controllers\Auth\LoginController;
>>>>>>> 2b59d42085164d63710d3da60b30c6108763cf9b

/**
 * Auth
**/

Route::get("acceder", [LoginController::class, "create"])
  ->name("login");

Route::post("acceder", [LoginController::class, "store"])
  ->name("login.store");

/*
 * ACP
 */

Route::middleware("auth")->group(function ()
{
  
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


  // ACP > Comentaris

  Route::get("acp/comentaris", [AdminController::class, "comments"])
    ->name("acp.comments");

  Route::get("acp/comentaris/crear", [CommentController::class, "create"])
    ->name("acp.comments.create");

  Route::post("/acp/comentaris", [CommentController::class, "store"])
    ->name("acp.comments.store");

  Route::get("acp/comentaris/{license}/editar", [CommentController::class, "edit"])
    ->name("acp.comments.edit");

  Route::put("/acp/comentaris/{license}", [CommentController::class, "update"])
    ->name("acp.comments.update");

  Route::delete("/acp/comentaris/{license}", [CommentController::class, "destroy"])
    ->name("acp.comments.destroy");


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

   Route::get("acp/configuracio/{setting}/editar", [SettingController::class, "edit"])
   ->name("acp.settings.edit");
 
   Route::put("/acp/configuracio/{setting}", [SettingController::class, "update"])
   ->name("acp.settings.update");
 
});

//view home
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

//view articles/tramits
Route::get('/{category}/{article}', [ArticleController::class, 'view'])
    ->name('article.view');

//show article test
Route::get('/article/show/{article}', [ArticleController::class, 'test'])
    ->name('article.show');

//view categories
Route::get('/{slug}', [CategoryController::class, 'view'])
    ->name('category.view');

// Fallback route
Route::fallback(function() {
    return route();
});
