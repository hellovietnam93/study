<?php

namespace studyhub\Jobs;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Bus\SelfHandling;

class AuthenticateUser extends Job implements SelfHandling
{
  protected $email, $password, $active, $remember;

  public function __construct($email, $password, $active, $remember)
  {
    $this->email = $email;
    $this->password = $password;
    $this->active = $active;
    $this->remember = $remember;
  }

  public function handle(Guard $auth)
  {
    $credentials = [
      'email'    => $this->email,
      'password' => $this->password,
      'active'   => $this->active,
    ];
    return $auth->attempt($credentials, $this->remember);
  }
}
