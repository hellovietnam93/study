<?php

namespace studyhub\Repositories\UserClass;

interface UserClassRepositoryInterface
{
  public function getAll();
  public function countAll();
  public function create($courseID, $classID, $userID);
}
