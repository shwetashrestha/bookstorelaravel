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


Route::get('bestbooks','BestBookController@index');
Route::group(['prefix' => 'bestbooks'], function() {
    Route::post('/', 'BestBookController@store');
    Route::post('/update/{bestbooks}','BestBookController@update');  
    Route::delete('/delete/{bestbooks}','BestBookController@destroy');    
});


Route::get('contactforms','ContactFormController@index');
Route::group(['prefix' => 'contactforms'], function() {
    Route::post('/', 'ContactFormController@store');
    Route::post('/update/{contactforms}','ContactFormController@update');  
    Route::delete('/delete/{contactforms}','ContactFormController@destroy');    
});

Route::get('abouts','AboutController@index');
Route::group(['prefix' => 'abouts'], function() {
    Route::post('/', 'AboutController@store');
    Route::post('/update/{abouts}','AboutController@update');  
    Route::delete('/delete/{abouts}','AboutController@destroy');    
});
Route::get('books','BookController@index');
Route::group(['prefix' => 'books'], function() {
    Route::post('/', 'BookController@store');
    Route::post('/update/{books}','BookController@update');  
    Route::delete('/delete/{Books}','BookController@destroy');    
});



