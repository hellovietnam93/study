<?php

namespace studyhub\Providers;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
  public function boot()
  {
    $this->onlyAlphabeticalCharactersAndSpacesRule();
  }

  protected function onlyAlphabeticalCharactersAndSpacesRule()
  {
    $this->app->make('validator')->extend('alpha_spaces', function ($attribute,
      $value, $parameters)
    {
      return preg_match('/^[\pL\s]+$/u', $value);
    });
  }

  public function register()
  {

  }
}
