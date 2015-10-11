<?php

namespace studyhub\Jobs;

use Illuminate\Contracts\Bus\SelfHandling;

class ModifyCourse extends Job implements SelfHandling
{
  protected $course, $oldName, $newName;
  public function __construct($user, $old_name, $new_name)
  {
    $this->user = $user;
    $this->oldName = $old_name;
    $this->newName = $new_name;
  }

  public function handle()
  {
    if ($this->areTheSameNames()) {
      return false;
    }
    return $this->setNewName();
  }

  protected function areTheSameNames()
  {
    return strcasecmp($this->oldName, $this->newName) == 0;
  }

  protected function setNewName()
  {
    $this->course->name = $this->newName;
    return $this->course->save();
  }
}
