<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\HomePageApiController ;
use App\Http\Controllers\Api\V1\BlogPageApiController ;
use App\Http\Controllers\Api\V1\ShowArticlePageApiController;
use App\Http\Controllers\Api\V1\ArticleApiController;
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
Route::name('page.')
    ->prefix('page/')
    ->group(function () {

        Route::get('home', HomePageApiController::class)
            ->name('home');

        Route::get('blog',BlogPageApiController::class)
            ->name('blog');

        Route::get('article',ShowArticlePageApiController::class)
            ->name('article.show');
    });

Route::apiResource('article',ArticleApiController::class)
    ->only(['index']);
