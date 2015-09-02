<?php
namespace studyhub\Providers;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeAllViews();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerArtisanGenerator();
        $this->registerMailer();
    }

    protected function registerArtisanGenerator()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(\Laracasts\Generators\GeneratorsServiceProvider::class);
        }
    }

    protected function composeAllViews()
    {
        view()->composer('*', function ($view) {
            return $view->with('authUser', auth()->user());
        });
    }

    protected function registerMailer()
    {
        $this->app->singleton(
            \studyhub\Mailers\Contracts\MailerInterface::class,
            \studyhub\Mailers\Mailer::class
        );
    }

}
