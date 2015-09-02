<?php

Route::group(['prefix' => 'auth', 'as' => 'auth::', 'namespace' => 'Auth'], function () {
    Route::get('register', ['as' => 'register', 'uses' => 'AuthController@getRegister']);
    Route::post('register', ['as' => 'register', 'uses' => 'AuthController@postRegister']);
    Route::get('activate/{code}', ['as' => 'activate', 'uses' => 'AuthController@activate']);
    Route::get('login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
    Route::patch('{users}/change-password', ['as' => 'change.password', 'uses' => 'AccountController@changePassword']);
    Route::patch('{users}/change-username', ['as' => 'change.username', 'uses' => 'AccountController@changeUsername']);
    Route::controllers(['password' => 'PasswordController']);
});
