<?php

namespace studyhub\Repositories\StudyClass;

use studyhub\Entities\Classes\StudyClass;
use studyhub\Entities\Courses\Course;
use studyhub\Entities\Users\User;
use studyhub\Repositories\EloquentRepository;

class EloquentStudyClassRepository extends EloquentRepository implements StudyClassRepositoryInterface
{
  protected $model;

  public function __construct(StudyClass $model)
  {
      $this->model = $model;
  }

  public function create(array $data, $courseID)
  {
    return $this->model->create([
      'id' => $data['id'],
      'name' => $data['name'],
      'description' => $data['description'],
      'course_id' => $courseID,
      'type' => $data['type'],
      'semester' => $data['semester'],
      'max_student' => $data['max_student'],
      'enroll_key' => str_random(8),
      'user_id' => get_by_key('user_id', $data)
    ]);
  }

  public function update(array $data, $courseID, $id)
  {
    $course = Course::find($courseID);

    $StudyClass = $this->findClassByCourse($course, $id);
    $StudyClass->update($data);

    return $StudyClass;
  }

  public function restore($slug)
  {
    $Course = $this->findDisabledCourseBySlug($slug);
    $Course->restore();
  }

  public function softDelete($courseID, $id)
  {
    $course = Course::find($courseID);

    $StudyClass = $this->findClassByCourse($course, $id);
    $StudyClass->delete();
  }

  public function forceDelete($slug)
  {
    $Course = $this->findDisabledCourseBySlug($slug);
    $Course->tasks()->withTrashed()->forceDelete();
    $Course->profile()->withTrashed()->forceDelete();
    $Course->forceDelete();
  }

  public function fetchDisabledCourses($limit)
  {
    return $this->model
      ->onlyTrashed()
      ->latest('deleted_at')
      ->paginate($limit);
  }

  public function findDisabledCourseBySlug($slug)
  {
    return $this->model
      ->onlyTrashed()
      ->where('slug', $slug)
      ->firstOrFail();
  }

  public function fetchCourseUrgentClasses($course)
  {
    return $this->model->where('course_id', $course->id)->get();
  }

  public function findOrCreateNew(array $CourseData, $authProvider)
  {
    $Course = $this->model
      ->where('auth_provider_id', $CourseData['auth_provider_id'])
      ->first();
    $CourseExisted = $this->model
      ->where('email', $CourseData['email'])
      ->first();
    if (!$Course && $CourseExisted) {
        return false;
    }
    if (!$Course) {
      $Course = $this->model->create($CourseData);
      $Course->update([
        'auth_provider' => $authProvider,
        'active' => true,
        'activation_code' => '',
      ]);
    }

    return $Course;
  }

  public function findClassByCourse($course, $id)
  {
    return $this->model
      ->where('course_id', $course->id)
      ->where('id', $id)
      ->firstOrFail();
  }

  public function fetchAllClassOfLuctere($lecturer)
  {
    return $this->model->where('user_id', $lecturer->id)->get();
  }

  public function fetchUsers($class)
  {
    return User::whereIn('id', $class->user_class()->lists('user_id')->toArray())->get();
  }

  public function updateLecturer($class, $user)
  {
    return $class->update([
      'user_id' => $user->id
    ]);
  }
}
