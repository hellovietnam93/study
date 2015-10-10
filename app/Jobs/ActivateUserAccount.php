<?php

namespace studyhub\Jobs;

use Illuminate\Contracts\Bus\SelfHandling;
use studyhub\Repositories\User\UserRepositoryInterface as UserRepo;

class ActivateUserAccount extends Job implements SelfHandling
{
  protected $code;

  public function __construct($code)
  {
    $this->code = $code;
  }

  public function handle(UserRepo $users)
  {
    $user = $users->findByActivationCode($this->code);
    if ($this->isActivatable($user)) {
      auth()->login($user);
      return true;
    }
    return false;
  }

  protected function isActivatable($user)
  {
    return $user->update(['activation_code' => '', 'active' => true]);
  }
}
