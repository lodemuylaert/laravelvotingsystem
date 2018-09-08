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
//api's frontend

    Route::get('partijen', 'Api\PartieControllerApi@index');
    Route::get('user/{user_id}/vote', 'Api\VoteControllerApi@index');
    Route::post('user/createvote', 'Api\VoteControllerApi@store');



