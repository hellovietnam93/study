<?php

namespace studyhub\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
  protected $defer = true;

  public function register()
  {
    $this->registerRepositories();
  }

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
    $this->app->singleton(
      \studyhub\Repositories\UserClass\UserClassRepositoryInterface::class,
      \studyhub\Repositories\UserClass\EloquentUserClassRepository::class
    );
  }

  public function provides()
  {
    return [
      \studyhub\Repositories\User\UserRepositoryInterface::class,
      \studyhub\Repositories\Course\CourseRepositoryInterface::class,
      \studyhub\Repositories\StudyClass\StudyClassRepositoryInterface::class,
      \studyhub\Repositories\UserClass\UserClassRepositoryInterface::class,
    ];
  }
}
