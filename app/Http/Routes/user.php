<?php

Route::group(['middleware' => ['auth'], 'prefix' => 'member',
  'namespace' => 'User'], function () {

  Route::resource('course', 'CoursesController', [
    'only' => ['index', 'show'],
    'names' => [
      'index'   => 'member::courses',
      'show'    => 'member::course.show'
    ]
  ]);

  Route::resource('course.class', 'StudyClassesController', [
    'only' => ['index', 'show'],
    'names' => [
      'index'   => 'member::classes',
      'show'    => 'member::class.show'
    ]
  ]);

  Route::resource('course.class.enroll', 'UserClassesController', [
    'only' => ['create', 'store', 'destroy'],
    'names' => [
      'create'   => 'member::enroll',
      'destroy'  => 'member::enroll.destroy',
      'store'    => 'member::enroll.store'
    ]
  ]);
});
