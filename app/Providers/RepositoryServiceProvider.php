<?php

namespace studyhub\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRepositories();
    }

    //dùng interface.
    /**
     * Bind all repository interfaces to their concrete implementations.
     */
    protected function registerRepositories()
    {
        $this->app->singleton(
            \studyhub\Repositories\User\UserRepositoryInterface::class,
            \studyhub\Repositories\User\EloquentUserRepository::class
        );

        $this->app->singleton(
            \studyhub\Repositories\Course\CourseRepositoryInterface::class,
            \studyhub\Repositories\Course\EloquentCourseRepository::class
        );

        $this->app->singleton(
            \studyhub\Repositories\StudyClass\StudyClassRepositoryInterface::class,
            \studyhub\Repositories\StudyClass\EloquentStudyClassRepository::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            \studyhub\Repositories\User\UserRepositoryInterface::class,
            \studyhub\Repositories\Course\CourseRepositoryInterface::class,
            \studyhub\Repositories\StudyClass\StudyClassRepositoryInterface::class,
        ];
    }
}
