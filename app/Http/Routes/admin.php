<?php

Route::group(['middleware' => ['auth', 'valid.roles:admin'], 'prefix' => 'admin',
  'namespace' => 'Admin'], function () {
  Route::resource('dashboard', 'DashboardsController', [
    'only' => 'index',
    'names' => [
      'index' => 'admin::dashboards'
    ]
  ]);

  Route::resource('course', 'CoursesController', [
    'names' => [
      'index'   => 'admin::courses',
      'create'  => 'admin::course.create',
      'store'   => 'admin::course.store',
      'show'    => 'admin::course.show',
      'edit'    => 'admin::course.edit',
      'update'  => 'admin::course.update',
      'destroy' => 'admin::course.destroy'
    ]
  ]);

  Route::resource('course.class', 'StudyClassesController', [
    'names' => [
      'index'   => 'admin::classes',
      'create'  => 'admin::class.create',
      'store'   => 'admin::class.store',
      'show'    => 'admin::class.show',
      'edit'    => 'admin::class.edit',
      'update'  => 'admin::class.update',
      'destroy' => 'admin::class.destroy'
    ]
  ]);
});
