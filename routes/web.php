<?php

Auth::routes(); //ユーザーログイン前

// Route::group(['prefix' => 'users'], function () {
//     Route::get('/about', 'HomeController@about')->name('users.about');
//     Route::get('/test', 'HomeController@test')->name('users.test');
// });
Route::get('/', 'HomeController@home')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/test', 'HomeController@test')->name('test');

//ユーザーログイン後
Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {

    Route::get('/{user}/edit', 'UsersController@showEditForm')->name('users.edit');
    Route::post('/{user}/edit', 'UsersController@update')->name('users.update');
    Route::get('/{user}/edit/password', 'UsersController@showEditPasswordForm')->name('users.edit_password');
    Route::post('/{user}/edit/password', 'UsersController@updatePassword')->name('users.update_password');
    Route::get('/{user}', 'UsersController@show')->name('users.show');
    Route::post('/{user}', 'UsersController@destroy')->name('users.destroy');

    Route::group(['prefix' => 'shops'], function () {
        Route::get('/user_index', 'ShopsController@user_index')->name('shops.user_index');
        Route::get('/{shop}', 'ShopsController@user_show')->name('shops.user_show');
        Route::post('/{id}/likes', 'LikesController@store');
        Route::post('/{id}/likes/{like}', 'LikesController@destroy');
        Route::resource('shops.comments', 'CommentsController');
    });
});

//Customerログイン前
Route::group(['prefix' => 'customers'], function () {
    //ログイン
    Route::get('/login',     'Customer\Auth\LoginController@showLoginForm')->name('customers.auth.login');
    Route::post('/login',    'Customer\Auth\LoginController@login');

    // アカウント新規作成
    Route::get('/auth/register', 'Customer\Auth\RegisterController@showRegistrationForm')->name('customers.auth.register');
    Route::post('/auth/register', 'Customer\Auth\RegisterController@register');
});

//Customerログイン後
Route::group(['prefix' => 'customers', 'middleware' => 'auth:customer'], function () {
    Route::post('/auth/logout',   'Customer\Auth\LoginController@logout')->name('customers.auth.logout');
    Route::resource('shops', 'ShopsController');
    Route::resource('shops.foods', 'FoodsController', ['only' => ['create', 'store', 'destroy']]);
    Route::group(['prefix' => 'shops/{shop}/foods',], function () {
        Route::get('/edit', 'FoodsController@edit')->name('shops.foods.edit');
        Route::post('/update', 'FoodsController@update')->name('shops.foods.update');
    });

    //Customer情報編集
    Route::get('/{customer}/show', 'CustomersController@show')->name('customers.show');
    Route::get('/{customer}/edit', 'CustomersController@showEditForm')->name('customers.edit');
    Route::post('/{customer}/edit', 'CustomersController@edit');
    Route::get('/{customer}/edit/password', 'CustomersController@showEditPasswordForm')->name('customers.edit_password');
    Route::post('/{customer}/edit/password', 'CustomersController@editPassword');
    Route::post('/{customer}/destroy', 'CustomersController@destroy')->name('customers.destroy');
});
