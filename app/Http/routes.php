<?php

foreach (File::allFiles(__DIR__ . '/Routes') as $file) {
  require $file->getPathname();
}

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);
