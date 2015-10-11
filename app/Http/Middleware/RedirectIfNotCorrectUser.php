<?php

namespace studyhub\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use studyhub\Exceptions\InvalidUserException;
use studyhub\Repositories\User\UserRepositoryInterface as UserRepo;

class RedirectIfNotCorrectUser
{
  protected $users, $auth;

  public function __construct(UserRepo $userRepo, Guard $auth)
  {
    $this->users = $userRepo;
    $this->auth = $auth;
  }

  public function handle($request, Closure $next)
  {
    if ($request->route('users')) {
      $user = $this->users->findBySlug($request->route('users'));
      if (($user->id != $this->auth->user()->id) && !$this->auth->user()->isAdmin()) {
        throw new InvalidUserException(trans('exception.invalid_user_exception'));
      }
    }
    return $next($request);
  }
}
