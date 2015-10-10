<?php

namespace studyhub\Repositories\UserClass;

use studyhub\Entities\UserClass;
use studyhub\Repositories\EloquentRepository;

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

    public function checkUserInClass($class, @user)
    {
        $user_class = $this->model->where('class_id', $class->id)
                                    ->where('user_id', $user->id)
                                    ->firstOrFail();
        if !$user_class
            return true;
        else
            return false;
    }
}
