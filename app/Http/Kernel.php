<?php

namespace studyhub\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
  protected $middleware = [
    \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    \studyhub\Http\Middleware\EncryptCookies::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    \studyhub\Http\Middleware\VerifyCsrfToken::class,
  ];

  protected $routeMiddleware = [
    'auth'              => \studyhub\Http\Middleware\Authenticate::class,
    'auth.basic'        => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'guest'             => \studyhub\Http\Middleware\RedirectIfAuthenticated::class,
    'auth.correct'      => \studyhub\Http\Middleware\RedirectIfNotCorrectUser::class,
    'valid.permissions' => \studyhub\Http\Middleware\VerifyUserPermissions::class,
    'valid.roles'       => \studyhub\Http\Middleware\VerifyUserRoles::class,
  ];
}
