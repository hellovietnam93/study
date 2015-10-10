<?php

namespace studyhub\Jobs;

use studyhub\Events\UserHasRegistered;
use Illuminate\Contracts\Bus\SelfHandling;
use studyhub\Repositories\User\UserRepositoryInterface as UserRepo;

class RegisterUserAccount extends Job implements SelfHandling
{
  protected $name, $email, $password;
  public function __construct($name, $email, $password)
  {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }

  public function handle(UserRepo $users)
  {
    $credentials = [
      'name'     => $this->name,
      'email'    => $this->email,
      'password' => $this->password,
    ];
    $user = $users->create($credentials);
    if (!$user) {
      return false;
    }
    event(new UserHasRegistered($user));
    return true;
  }
}
