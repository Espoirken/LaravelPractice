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

Auth::routes();

Route::get('', function(){
    return redirect('admin');
});

Route::get('/home', function(){
    return redirect('admin');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@store')->name('register');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/', [
        'uses' => 'UserController@detail',
        'as' => 'detail',
    ]);

    Route::get('/profile/edit/{id}', [
        'uses' => 'UserController@edit_profile',
        'as' => 'profile.edit',
    ]);

    Route::post('/profile/update/{id}', [
        'uses' => 'UserController@update_profile',
        'as' => 'profile.update',
    ]);

    //Client Controller
    Route::get('/clients', [
        'uses' => 'UserController@index',
        'as' => 'clients',
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

    Route::any('/client/search', [
        'uses' => 'UserController@search',
        'as' => 'client.search',
    ]);

    Route::get('/client/detail/{id}', [
        'uses' => 'UserController@show',
        'as' => 'client.show',
    ]);

    Route::get('/client/view/{id}', [
        'uses' => 'UserController@view',
        'as' => 'client.view',
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

    Route::any('/child/search', [
        'uses' => 'ChildController@search',
        'as' => 'child.search',
    ]);

    Route::any('/child/attended/{id}', [
        'uses' => 'ChildController@attended',
        'as' => 'child.attended',
    ]);

    //Event Controller
    Route::get('/events', [
        'uses' => 'EventController@index',
        'as' => 'events',
    ]);

    Route::get('/event/create', [
        'uses' => 'EventController@create',
        'as' => 'event.create',
    ]);

    Route::post('/event/store', [
        'uses' => 'EventController@store',
        'as' => 'event.store',
    ]);

    Route::get('/event/edit/{id}', [
        'uses' => 'EventController@edit',
        'as' => 'event.edit',
    ]);

    Route::post('/event/update/{id}', [
        'uses' => 'EventController@update',
        'as' => 'event.update',
    ]);

    Route::get('/event/delete/{id}', [
        'uses' => 'EventController@destroy',
        'as' => 'event.delete',
    ]);

    Route::any('/events/search', [
        'uses' => 'EventController@search',
        'as' => 'event.search',
    ]);

    Route::any('/event/attend/{id}', [
        'uses' => 'EventController@attend',
        'as' => 'event.attend',
    ]);

    Route::any('/event/attendees/{id}', [
        'uses' => 'EventController@attendees',
        'as' => 'event.attendees',
    ]);

    Route::any('/event/join/{event_id}/child/{child_id}', [
        'uses' => 'EventController@join',
        'as' => 'event.join',
    ]);

    Route::any('/event/cancel/{event_id}/child/{child_id}', [
        'uses' => 'EventController@cancel',
        'as' => 'event.cancel',
    ]);

    //Super Admin Controller
    Route::get('/list', [
        'uses' => 'AdminController@index',
        'as' => 'admin',
    ]);

    Route::get('/create', [
        'uses' => 'AdminController@create',
        'as' => 'admin.create',
    ]);

    Route::post('/store', [
        'uses' => 'AdminController@store',
        'as' => 'admin.store',
    ]);

    Route::get('/edit/{id}', [
        'uses' => 'AdminController@edit',
        'as' => 'admin.edit',
    ]);

    Route::post('/update/{id}', [
        'uses' => 'AdminController@update',
        'as' => 'admin.update',
    ]);

    Route::get('/delete/{id}', [
        'uses' => 'AdminController@destroy',
        'as' => 'admin.delete',
    ]);

    Route::any('/search', [
        'uses' => 'AdminController@search',
        'as' => 'admin.search',
    ]);

});