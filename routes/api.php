<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \api\NasaController;
use \api\JsonPlaceController;

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


Route::group([
    'prefix' => 'nasa'
], function () {
    Route::get('apod', 'api\NasaController@apod');
    Route::get('neo/{start}/{end}', 'api\NasaController@neo');
    Route::get('neoBrowser/', 'api\NasaController@neoBrowser');
});


Route::group([
    'prefix' => 'place'
], function () {
    Route::get('post', 'api\JsonPlaceController@index');
    Route::post('post/create', 'api\JsonPlaceController@store');
    Route::get('/post/{post}', 'api\JsonPlaceController@show');
});