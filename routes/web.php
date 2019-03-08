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

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

Route::get('/client', [
    'uses' => 'UserController@index',
    'as' => 'client',
]);

Route::get('/client/create', [
    'uses' => 'UserController@create',
    'as' => 'client.create',
]);

Route::post('/client/store', [
    'uses' => 'UserController@store',
    'as' => 'client.store',
]);

Route::get('/client/edit/{id}', [
    'uses' => 'UserController@edit',
    'as' => 'client.edit',
]);

Route::post('/client/update/{id}', [
    'uses' => 'UserController@update',
    'as' => 'client.update',
]);

Route::get('/client/delete/{id}', [
    'uses' => 'UserController@destroy',
    'as' => 'client.delete',
]);



});
    