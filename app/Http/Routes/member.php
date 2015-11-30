<?php

Route::group(['middleware' => ['auth', 'valid.roles:lecturer']], function () {
  Route::resource('course.class', 'StudyClassesController', [
    'only' => ['create', 'store', 'edit', 'update', 'destroy'],
    'names' => [
      'store'   => 'class.store',
      'edit'    => 'class.edit',
      'update'  => 'class.update',
      'create'  => 'class.create',
      'destroy' => 'class.destroy'
    ]
  ]);
});

Route::group(['middleware' => ['auth']], function () {
  Route::resource('course', 'CoursesController', [
    'only' => ['index', 'show'],
    'names' => [
      'index'   => 'courses',
      'show'    => 'course.show'
    ]
  ]);

  Route::resource('course.class', 'StudyClassesController', [
    'only' => ['index', 'show'],
    'names' => [
      'index'   => 'classes',
      'show'    => 'class.show'
    ]
  ]);

  Route::resource('course.class.enroll', 'EnrollsController', [
    'only' => ['create', 'store'],
    'names' => [
      'create'   => 'enroll',
      'store'    => 'enroll.store'
    ]
  ]);
});
