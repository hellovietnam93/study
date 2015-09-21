<?php

Route::group(['middleware' => ['auth', 'valid.roles:lecturer'], 'prefix' => 'lecturer',
  'as' => 'lecturer::', 'namespace' => 'Lecturer',], function () {
  // Route::group(['prefix' => 'class/published', 'as' => 'class.published'], function () {
  //   Route::delete('{class}', ['as' => '.delete', 'uses' => 'StudyClassesController@softDelete']);
  // });

  // Route::group(['prefix' => 'course', 'as' => 'course'], function () {
  //   Route::get('uploads', ['as' => '.upload', 'uses' => 'CoursesController@getUpload']);
  //   Route::post('uploads', ['as' => '.upload', 'uses' => 'CoursesController@postUpload']);
  // });
});

Route::group(['middleware' => ['auth', 'valid.roles:lecturer'], 'prefix' => 'lecturer',
  'namespace' => 'Lecturer'], function () {

  Route::resource('course', 'CoursesController', [
      'names' => [
          'index'   => 'lecturer::courses',
          'create'  => 'lecturer::course.create',
          'store'   => 'lecturer::course.store',
          'show'    => 'lecturer::course.show',
          'edit'    => 'lecturer::course.edit',
          'update'  => 'lecturer::course.update',
          'destroy' => 'lecturer::course.destroy'
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
});
