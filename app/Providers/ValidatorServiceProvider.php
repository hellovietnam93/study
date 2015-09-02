<?php

namespace studyhub\Providers;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    //bổ sung thêm validate cho laravel.
    //doc: extend validation
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->onlyAlphabeticalCharactersAndSpacesRule();
    }

    /**
     * Validate that given pattern contains only alphabetical characters and spaces.
     */
    protected function onlyAlphabeticalCharactersAndSpacesRule()
    {
        $this->app->make('validator')->extend('alpha_spaces', function ($attribute, $value, $parameters) {
            return preg_match('/^[\pL\s]+$/u', $value);
        });
    }

    //hàm overwrite không làm cũng phải viết
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
