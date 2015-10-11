<?php

namespace studyhub\Jobs;

use Illuminate\Contracts\Bus\SelfHandling;

class ModifyUserPassword extends Job implements SelfHandling
{
  protected $user, $oldPassword, $newPassword;
  public function __construct($user, $old_password, $new_password)
  {
    $this->user = $user;
    $this->oldPassword = $old_password;
    $this->newPassword = $new_password;
  }

  public function handle()
  {
    if (!$this->isValidOldPassword()) {
      return false;
    }
    return $this->setNewPassword();
  }

  protected function isValidOldPassword()
  {
    return app('hash')->check($this->oldPassword, $this->user->password);
  }

  protected function setNewPassword()
  {
    $this->user->password = $this->newPassword;
    return $this->user->save();
  }
}
