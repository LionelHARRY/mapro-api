<?php

use App\Http\Controllers\ArticleCathegoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteArticleController;
use App\Http\Controllers\FavoriteShopController;
use App\Http\Controllers\ShopCathegoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Models\ArticleCathegory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signin', [AuthController::class, 'signin']);
Route::post('signup', [AuthController::class, 'signup']);

Route::apiResource('users', UserController::class);
Route::apiResource('articles', ArticleController::class);
Route::apiResource('articles-cathegories', ArticleCathegoryController::class);
Route::apiResource('favorite-articles', FavoriteArticleController::class);
Route::apiResource('shops', ShopController::class);
Route::apiResource('shops-cathegories', ShopCathegoryController::class);
Route::apiResource('favorite-shops', FavoriteShopController::class);
