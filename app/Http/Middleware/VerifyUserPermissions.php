<?php

namespace studyhub\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use studyhub\Exceptions\InvalidPermissionsException;

class VerifyUserPermissions
{
  protected $auth;

  public function __construct(Guard $auth)
  {
    $this->auth = $auth;
  }

  public function handle($request, Closure $next, $permissions)
  {
    $user = $this->auth->user();
    if (!($this->auth->check() && $user->can($permissions, true))) {
      throw new InvalidPermissionsException(trans('exception.invalid_permission_exception', [
        'user' => $user->name
      ]));
    }
    return $next($request);
  }
}
