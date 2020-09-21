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
Route::group(['prefix' => 'contents', 'middleware' => 'auth'], function() {
    Route::get('/user_index', 'ContentsController@user_index' ) ->name('contents.user_index');
    Route::get('/{id}', 'ContentsController@user_show' ) ->name('contents.user_show');
    Route::post('/{id}/likes', 'LikesController@store');
    Route::post('/{id}/likes/{like}', 'LikesController@destroy');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('/edit', 'UsersController@showEditForm' ) ->name('user.edit');
    Route::post('/edit', 'UsersController@edit' );
    Route::get('/edit/password', 'UsersController@showEditPasswordForm' ) ->name('user.edit_password');
    Route::post('/edit/password', 'UsersController@editPassword' );
    Route::post('/destroy', 'UsersController@showEditForm' ) ->name('user.destroy');
});



//Customer認証不要
Route::group(['prefix' => 'customer'], function() {
    Route::get('/',         function () { return redirect('/customer/home'); });
    Route::get('/login',     'Customer\Auth\LoginController@showLoginForm')->name('customer.auth.login');
    Route::post('/login',    'Customer\Auth\LoginController@login');
    Route::get('/auth/register', 'Customer\Auth\RegisterController@showRegistrationForm')->name('customer.auth.register');
    Route::post('/auth/register', 'Customer\Auth\RegisterController@register');
});

//Customerログイン後
Route::group(['prefix' => 'customer', 'middleware' => 'auth:customer'], function() {
    Route::post('/auth/logout',   'Customer\Auth\LoginController@logout')->name('customer.auth.logout');
    Route::get('home',      'Customer\HomeController@index')->name('customer.home');
    Route::get('/contents/index', 'ContentsController@index' ) ->name('contents.index');
    Route::get('/contents/create', 'ContentsController@showCreateForm' ) ->name('contents.create');
    Route::post('/contents/create', 'ContentsController@create' );
    Route::get('/contents/{id}', 'ContentsController@show' ) ->name('contents.show');
    Route::get('/contents/{id}/edit', 'ContentsController@showEditForm' ) ->name('contents.edit');
    Route::post('/contents/{id}/edit', 'ContentsController@edit' );
    Route::post('/contents/{id}/destroy', 'ContentsController@destroy' ) ->name('contents.destroy');
});

