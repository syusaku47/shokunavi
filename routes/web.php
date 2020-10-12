<?php

Auth::routes(); //ユーザーログイン前

//ユーザーログイン後
Route::group(['prefix' => 'users', 'middleware' => 'auth'], function() {
    Route::get('/edit', 'UsersController@showEditForm' ) ->name('users.edit');
    Route::post('/edit', 'UsersController@edit' );
    Route::get('/edit/password', 'UsersController@showEditPasswordForm' ) ->name('users.edit_password');
    Route::post('/edit/password', 'UsersController@editPassword' );
    Route::post('/{user}', 'UsersController@destroy' ) ->name('users.destroy');
    
    Route::group(['prefix' => 'shops'], function() {
        Route::get('/user_index', 'ShopsController@user_index' ) ->name('shops.user_index');
        Route::get('/{shop}', 'ShopsController@user_show' ) ->name('shops.user_show');
        Route::post('/{id}/likes', 'LikesController@store');
        Route::post('/{id}/likes/{like}', 'LikesController@destroy');
    });
});

//Customerログイン前
Route::group(['prefix' => 'customers'], function() {
    //ログイン
    Route::get('/login',     'Customer\Auth\LoginController@showLoginForm')->name('customers.auth.login');
    Route::post('/login',    'Customer\Auth\LoginController@login');

    // アカウント新規作成
    Route::get('/auth/register', 'Customer\Auth\RegisterController@showRegistrationForm')->name('customers.auth.register');
    Route::post('/auth/register', 'Customer\Auth\RegisterController@register');
});

//Customerログイン後
Route::group(['prefix' => 'customers', 'middleware' => 'auth:customer'], function() {
    Route::post('/auth/logout',   'Customer\Auth\LoginController@logout')->name('customers.auth.logout');
    Route::resource('shops', 'ShopsController');
    Route::resource('shops.foods', 'FoodsController',['only' => ['create','store','destroy']]);
    Route::group(['prefix' => 'shops/{shop}/foods',], function() {
        Route::get('/edit','FoodsController@edit')->name('shops.foods.edit');
        Route::post('/update','FoodsController@update')->name('shops.foods.update');
    });

    //Customer情報編集
    Route::get('/info','CustomersController@info')->name('customers.info');
    Route::get('/edit', 'CustomersController@showEditForm' ) ->name('customers.edit');
    Route::post('/edit', 'CustomersController@edit' );
    Route::get('/edit/password', 'CustomersController@showEditPasswordForm') ->name('customers.edit_password');
    Route::post('/edit/password', 'CustomersController@editPassword' );
    Route::post('/destroy', 'CustomersController@destroy' ) ->name('customers.destroy');
});

