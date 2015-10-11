<?php

namespace studyhub\Repositories\UserClass;

use studyhub\Entities\UserClass;
use studyhub\Repositories\EloquentRepository;
use studyhub\Entities\Classes\StudyClass;

class EloquentUserClassRepository extends EloquentRepository implements UserClassRepositoryInterface
{
  protected $model;

  public function __construct(UserClass $model)
  {
    $this->model = $model;
  }

  public function create($courseID, $classID, $userID)
  {
    return $this->model->create([
      'course_id' => $courseID,
      'class_id' => $classID,
      'user_id' => $userID,
    ]);
  }
}
