<?php

use Illuminate\Http\Request;

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

Route::get('propsal','PropsalsAPi@index');
Route::get('propsal/{id}','PropsalsAPi@show');
Route::post('propsal','PropsalsAPi@store');
Route::put('propsal','PropsalsAPi@update');
