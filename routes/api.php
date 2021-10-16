<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('missions', 'App\Http\Controllers\Api\Client\MissionController@find');
Route::get('missions/{id}', 'App\Http\Controllers\Api\Client\MissionController@read');

Route::get('terrain-features', 'App\Http\Controllers\Api\Client\TerrainFeatureController@find');
Route::get('terrain-features/{id}', 'App\Http\Controllers\Api\Client\TerrainFeatureController@read');
