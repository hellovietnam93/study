<?php

namespace studyhub\Jobs;

use Illuminate\Contracts\Bus\SelfHandling;

class ModifyUserName extends Job implements SelfHandling
{
  protected $user, $oldUsername, $newUsername;
  public function __construct($user, $old_username, $new_username)
  {
    $this->user = $user;
    $this->oldUsername = $old_username;
    $this->newUsername = $new_username;
  }

  public function handle()
  {
    if ($this->areTheSameNames()) {
      return false;
    }
    return $this->setNewUsername();
  }

  protected function areTheSameNames()
  {
    return strcasecmp($this->oldUsername, $this->newUsername) == 0;
  }

  protected function setNewUsername()
  {
    $this->user->name = $this->newUsername;
    return $this->user->save();
  }
}
