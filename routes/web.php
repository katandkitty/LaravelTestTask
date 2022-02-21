<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\ArticleController::class, 'main_page']);
Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index']);
Route::get('/articles/{article}', [\App\Http\Controllers\ArticleController::class, 'show']);

Route::post('/like', [\App\Http\Controllers\ArticleController::class, 'like']);
Route::post('/view', [\App\Http\Controllers\ArticleController::class, 'view']);
Route::post('/comment', [\App\Http\Controllers\ArticleController::class, 'comment']);
