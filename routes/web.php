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
Auth::routes(); //ユーザーログイン

//ユーザーログイン後
Route::group(['prefix' => 'shops', 'middleware' => 'auth'], function() {
    Route::get('/user_index', 'ShopsController@user_index' ) ->name('shops.user_index');
    Route::get('/{id}', 'ShopsController@user_show' ) ->name('shops.user_show');
    Route::post('/{id}/likes', 'LikesController@store');
    Route::post('/{id}/likes/{like}', 'LikesController@destroy');

    //ユーザー情報
    Route::get('/edit', 'UsersController@showEditForm' ) ->name('user.edit');
    Route::post('/edit', 'UsersController@edit' );
    Route::get('/edit/password', 'UsersController@showEditPasswordForm' ) ->name('user.edit_password');
    Route::post('/edit/password', 'UsersController@editPassword' );
    Route::post('/destroy', 'UsersController@destroy' ) ->name('user.destroy');
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
    Route::resource('shops', 'ShopsController');
    Route::resource('shops.foods', 'FoodsController',['only' => ['create','store','destroy']]);
    Route::get('/shops/{shop}/foods/edit','FoodsController@edit')->name('shops.foods.edit');
    Route::post('/shops/{shop}/foods/update','FoodsController@update')->name('shops.foods.update');
    
    //Customer情報編集
    Route::get('/info','CustomersController@info')->name('customers.info');
    Route::get('/edit', 'CustomersController@showEditForm' ) ->name('customers.edit');
    Route::post('/edit', 'CustomersController@edit' );
    Route::get('/edit/password', 'CustomersController@showEditPasswordForm') ->name('customers.edit_password');
    Route::post('/edit/password', 'CustomersController@editPassword' );
    Route::post('/destroy', 'CustomersController@destroy' ) ->name('customers.destroy');
});

