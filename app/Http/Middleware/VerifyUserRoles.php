<?php

namespace studyhub\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use studyhub\Exceptions\InvalidRolesException;

class VerifyUserRoles
{
  protected $auth;

  public function __construct(Guard $auth)
  {
    $this->auth = $auth;
  }

  public function handle($request, Closure $next, $roles)
  {
    if (!$this->auth->user()->hasRole($roles, true)) {
      abort(404);
      // throw new InvalidRolesException(trans('exception.invalid_role_exception'));
    }
    return $next($request);
  }
}
