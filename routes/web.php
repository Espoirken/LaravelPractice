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

//Client Controller
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

//Children Controller
Route::get('/children', [
    'uses' => 'ChildController@index',
    'as' => 'children',
]);

Route::get('/child/create', [
    'uses' => 'ChildController@create',
    'as' => 'child.create',
]);

Route::post('/child/store', [
    'uses' => 'ChildController@store',
    'as' => 'child.store',
]);

Route::get('/child/edit/{id}', [
    'uses' => 'ChildController@edit',
    'as' => 'child.edit',
]);

Route::post('/child/update/{id}', [
    'uses' => 'ChildController@update',
    'as' => 'child.update',
]);

Route::get('/child/delete/{id}', [
    'uses' => 'ChildController@destroy',
    'as' => 'child.delete',
]);

});
    