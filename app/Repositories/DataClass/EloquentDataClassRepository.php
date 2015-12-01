<?php

namespace studyhub\Repositories\DataClass;

use studyhub\Entities\Classes\DataClass;
use studyhub\Repositories\EloquentRepository;

class EloquentDataClassRepository extends EloquentRepository implements DataClassRepositoryInterface
{
  protected $model;

  public function __construct(DataClass $model)
  {
    $this->model = $model;
  }

  public function import(array $credentials)
  {
    if ($credentials['semester'] != '' && $credentials['student_id'] != '' && $credentials['class_id'] != '' && $credentials['course_id'] != '') {
      $class = $this->model->where('semester', $credentials['semester'])
        ->where('student_id', $credentials['student_id'])
        ->where('class_id', $credentials['class_id'])
        ->where('course_id', $credentials['course_id'])
        ->first();
      if (!$class) {
        return $this->model->create([
          'semester' => $credentials['semester'],
          'student_id' => $credentials['student_id'],
          'class_id' => $credentials['class_id'],
          'class_type' => $credentials['class_type'],
          'course_id' => $credentials['course_id'],
          'course_title' => $credentials['course_title'],
          'reg_status' => $credentials['reg_status']
        ]);
      } else {
        return $class->update([
          'semester' => $credentials['semester'],
          'student_id' => $credentials['student_id'],
          'class_id' => $credentials['class_id'],
          'class_type' => $credentials['class_type'],
          'course_id' => $credentials['course_id'],
          'course_title' => $credentials['course_title'],
          'reg_status' => $credentials['reg_status']
        ]);
      }
    }
    return;
  }
}
