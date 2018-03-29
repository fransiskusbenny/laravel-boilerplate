<?php

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('user.login');
    Route::get('password/request', 'ForgotPasswordController@showLinkRequestForm')->name('get.password_request');
    Route::post('password/request', 'ForgotPasswordController@sendResetLinkEmail')->name('post.password_request');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('post.password_reset');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@home')->name('dashboard');
    Route::post('logout', 'Auth\LoginController@logout');

    Route::group(['prefix' => 'settings', 'namespace' => 'Settings'], function() {
        Route::get('menus', 'MenuController@index')->name('menus.index');
        Route::post('menus', 'MenuController@store')->name('menus.store');
        Route::patch('menus/{menu}', 'MenuController@update')->name('menus.update');
        Route::delete('menus/{menu}', 'MenuController@destroy')->name('menus.destroy');

        Route::get('permissions', 'PermissionController@index');

        Route::resource('users', 'UserController');
        Route::post('users/{user}/activate', 'UserStatusController@activate');
        Route::post('users/{user}/deactivate', 'UserStatusController@deactivate');
        Route::patch('users/{user}/change_password', 'UserPasswordController@update');
    });

    Route::get('account', 'Account\AccountController@index')->name('account');
    Route::patch('account', 'Account\AccountController@update');
});

Route::get('foo', function() {

//    Mail::to('fransiskusbennyhalim@gmail.com')->send(new \App\Mail\FooMail());
    flash()->success('Hello');
    return redirect()->route('get.password_request');
});