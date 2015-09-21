<?php

Route::group(['middleware' => ['auth', 'valid.roles:admin'], 'prefix' => 'admin', 'as' => 'admin::', 'namespace' => 'Admin',], function () {
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);
});
