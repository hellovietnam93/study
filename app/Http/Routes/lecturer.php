<?php

Route::group(['middleware' => ['auth', 'valid.roles:lecturer'], 'prefix' => 'lecturer',
  'as' => 'lecturer::', 'namespace' => 'Lecturer',], function () {
  Route::group(['prefix' => 'course', 'as' => 'course'], function () {
    Route::post('uploads', ['as' => '.upload', 'uses' => 'CourseUploadsController@store']);
  });
});

Route::group(['middleware' => ['auth', 'valid.roles:lecturer'], 'prefix' => 'lecturer',
  'namespace' => 'Lecturer'], function () {
  Route::resource('dashboard', 'DashboardsController', [
    'only' => 'index',
    'names' => [
      'index' => 'lecturer::dashboards'
    ]
  ]);

  Route::resource('course', 'CoursesController', [
    'only' => ['index', 'show'],
    'names' => [
      'index'   => 'lecturer::courses',
      'show'    => 'lecturer::course.show',
    ]
  ]);

  Route::resource('course.class', 'StudyClassesController', [
    'names' => [
      'index'   => 'lecturer::classes',
      'create'  => 'lecturer::class.create',
      'store'   => 'lecturer::class.store',
      'show'    => 'lecturer::class.show',
      'edit'    => 'lecturer::class.edit',
      'update'  => 'lecturer::class.update',
      'destroy' => 'lecturer::class.destroy'
    ]
  ]);

  Route::resource('course.class.enroll', 'EnrollsController', [
    'only' => ['create', 'store'],
    'names' => [
      'create'   => 'lecturer::enroll',
      'store'    => 'lecturer::enroll.store'
    ]
  ]);
});
