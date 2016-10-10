<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/left','TestController@left');
Route::get('/index','TestController@index');
Route::get('/indexapp','TestController@app');
Route::post('/appImport','ExcelController@appImport');
Route::get('/movedown/{app}','AppController@movedown');
Route::get('/moveup/{app}','AppController@moveup');
Route::resource('/bus','BusController');
Route::resource('/user','UserController');
Route::resource('/app','AppController');
Route::resource('/dat','DatController');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
