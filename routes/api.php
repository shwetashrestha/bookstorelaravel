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
//user

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('/users', 'UserController@index');
Route::middleware(['auth:api'])->prefix('users')->group(function () {
    Route::get('/', function () {
    Route::get('/{user}', 'UserController@details');
     });
});

Route::get('imagesliders','ImageSliderController@index');
Route::group(['prefix' => 'imagesliders'], function() {
    Route::post('/', 'ImageSliderController@store');
    Route::post('/update/{imagesliders}','ImageSliderController@update');  
    Route::delete('/delete/{imagesliders}','ImageSliderController@destroy');    
});

Route::get('newarrivals','NewArrivalController@index');
Route::group(['prefix' => 'newarrivals'], function() {
    Route::post('/', 'NewArrivalController@store');
    Route::post('/update/{newarrivals}','NewArrivalController@update');  
    Route::delete('/delete/{newarrivals}','NewArrivalController@destroy');
    
});


