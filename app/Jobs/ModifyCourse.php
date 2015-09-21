<?php

namespace studyhub\Jobs;

use Illuminate\Contracts\Bus\SelfHandling;

class ModifyCourse extends Job implements SelfHandling
{
    protected $course, $oldName, $newName;

    /**
     * Create a new job instance.
     *
     * @param $user
     * @param $old_username
     * @param $new_username
     */
    public function __construct($user, $old_name, $new_name)
    {
        $this->user = $user;
        $this->oldName = $old_name;
        $this->newName = $new_name;
    }

    /**
     * Change account name.
     *
     * @return bool
     */
    public function handle()
    {
        if ($this->areTheSameNames()) {
            return false;
        }

        return $this->setNewName();
    }

    /**
     * Check if the new username and old username are the same (case-sensitive).
     *
     * @return bool
     */
    protected function areTheSameNames()
    {
        return strcasecmp($this->oldName, $this->newName) == 0;
    }

    /**
     * Set the new username for the user.
     *
     * @return bool
     */
    protected function setNewName()
    {
        $this->course->name = $this->newName;

        return $this->course->save();
    }
}
