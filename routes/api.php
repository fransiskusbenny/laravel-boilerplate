<?php

Route::group(['namespace' => 'Settings'], function () {
    Route::get('users', 'UserController@index');
    Route::get('permissions', 'PermissionController@index');
    Route::get('roles', 'RoleController@index');
    Route::get('menus', 'MenuController@index');
});
