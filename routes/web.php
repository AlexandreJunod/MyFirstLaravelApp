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

Route::get('/admin', 'AdminController@index');
Route::post('/admin/kill', 'AdminController@kill');
Route::post('/admin/add', 'AdminController@add');

//Route::get('/admin/{personId}/{newname}', 'AdminController@edit');
//Route::get('/admin/hide/{id}', 'AdminController@hide');
