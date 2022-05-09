<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\HomePageApiController ;

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
/* @todo modify route service provider */
Route::name('api.v1.')
        ->prefix('/v1/')
        ->group(function (){

            Route::name('page.')
                ->prefix('page/')
                ->group(function (){

                    Route::get('home',HomePageApiController::class)
                            ->name('home');

                });


        });
