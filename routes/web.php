<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\folder\MainController;
use App\Http\Controllers\folder\CatalogController;
use App\Http\Controllers\analytics\AnalyticsController;
use App\Http\Controllers\posts\PostController;

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



Route::get('/', [MainController::class, 'index']);
Route::get('/articles', [CatalogController::class, 'index']);
Route::get('/article/{tag}', [CatalogController::class, 'filter']);
Route::get('/articles/{slug}', [PostController::class, 'index']);

Route::get('/likes', [AnalyticsController::class, 'likes']);
Route::get('/views', [AnalyticsController::class, 'views']);


Route::get('/comments', [PostController::class, 'comments']);
