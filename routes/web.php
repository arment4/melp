<?php

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/restaurants','RestaurantsController@index');

Route::get('/restaurants/create','RestaurantsController@create');

Route::post('/restaurants','RestaurantsController@add');

Route::post('/restaurants/upload','RestaurantsController@loadFromCsv');

Route::get('/restaurants/{restaurant}/edit','RestaurantsController@edit');

Route::patch('/restaurants/{restaurant}','RestaurantsController@update');

Route::delete('/restaurants/{restaurant}','RestaurantsController@destroy');

Route::get('/restaurants/all','RestaurantsController@showAll');

Route::get('/restaurants/statistics','RestaurantsController@search');

