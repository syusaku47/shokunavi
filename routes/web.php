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

//ユーザー認証不要
Route::get('/home', 'HomeController@index')->name('home');

//ユーザーログイン後
Route::group(['middleware' => 'auth'], function() {
    Route::get('/index', 'ContentsController@index' ) ->name('contents.index');
    Route::get('/create', 'ContentsController@showCreateForm' ) ->name('contents.create');
    Route::post('/create', 'ContentsController@create' );
    Route::get('/contents/{id}', 'ContentsController@show' ) ->name('contents.show');
    Route::get('/contents/{id}/edit', 'ContentsController@showEditForm' ) ->name('contents.edit');
    Route::post('/contents/{id}/edit', 'ContentsController@edit' );
    Route::post('/contents/{id}/destroy', 'ContentsController@destroy' ) ->name('contents.destroy');
    Route::get('/contents/like/{id}', 'ContentsController@like')->name('reply.like');
    Route::get('/contents/unlike/{id}', 'ContentsController@unlike')->name('reply.unlike');
    Route::post('/contents/{post}/likes', 'LikesController@store');
    Route::post('/contents/{post}/likes/{like}', 'LikesController@destroy');
});

//Customer認証不要
Route::group(['prefix' => 'customer'], function() {
    Route::get('/',         function () { return redirect('/customer/home'); });
    Route::get('login',     'Customer\LoginController@showLoginForm')->name('customer.login');
    Route::post('login',    'Customer\LoginController@login');
});

//Customerログイン後
Route::group(['prefix' => 'customer', 'middleware' => 'auth:customer'], function() {
    Route::post('logout',   'Customer\LoginController@logout')->name('customer.logout');
    Route::get('home',      'Customer\HomeController@index')->name('customer.home');
    Route::get('/index', 'ContentsController@index' ) ->name('contents.index');
    Route::get('/create', 'ContentsController@showCreateForm' ) ->name('contents.create');
    Route::post('/create', 'ContentsController@create' );
    Route::get('/contents/{id}', 'ContentsController@show' ) ->name('contents.show');
    Route::get('/contents/{id}/edit', 'ContentsController@showEditForm' ) ->name('contents.edit');
    Route::post('/contents/{id}/edit', 'ContentsController@edit' );
    Route::post('/contents/{id}/destroy', 'ContentsController@destroy' ) ->name('contents.destroy');
});

