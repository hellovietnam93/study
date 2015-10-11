<?php
namespace studyhub\Providers;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
class EventServiceProvider extends ServiceProvider
{
  protected $listen = [];

  protected $subscribe = [
    \studyhub\Listeners\UserEventListener::class,
  ];

  public function boot(DispatcherContract $events)
  {
    parent::boot($events);
  }
}
