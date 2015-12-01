<?php

namespace studyhub\Repositories\Course;

use studyhub\Entities\Courses\Course;
use studyhub\Repositories\EloquentRepository;

class EloquentCourseRepository extends EloquentRepository implements CourseRepositoryInterface
{
  protected $model;

  public function __construct(Course $model)
  {
    $this->model = $model;
  }

  public function create(array $credentials)
  {
    return $this->model->create([
      'id' => $credentials['id'],
      'name' => $credentials['name'],
      'description' => $credentials['description'],
      'credit' => $credentials['credit'],
      'credit_fee' => $credentials['credit_fee'],
      'theory_duration' => $credentials['theory_duration'],
      'exercise_duration' => $credentials['exercise_duration'],
      'practice_duration' => $credentials['practice_duration'],
      'weight' => $credentials['weight'],
      'en_name' => $credentials['en_name'],
      'abbr_name' => $credentials['abbr_name'],
      'language' => $credentials['language'],
      'evaludation' => $credentials['evaludation']
    ]);
  }

  public function updateProfile(array $credentials, $slug)
  {
    $Course = $this->findBySlug($slug);
    $Course->profile()->update($credentials);
  }

  public function update(array $data, $id)
  {
    $Course = $this->findById($id);
    $Course->update($data);

    return $Course;
  }

  public function restore($slug)
  {
    $Course = $this->findDisabledCourseBySlug($slug);
    $Course->restore();
  }

  public function softDelete($id)
  {
    $Course = $this->findById($id);
    $Course->delete();
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

  public function import(array $credentials)
  {
    return $this->model->create([
      'id' => $credentials['id'],
      'name' => $credentials['name'],
      'description' => $credentials['description'],
      'credit' => $credentials['credit'],
      'credit_fee' => $credentials['credit_fee'],
      'theory_duration' => $credentials['theory_duration'],
      'exercise_duration' => $credentials['exercise_duration'],
      'practice_duration' => $credentials['practice_duration'],
      'weight' => $credentials['weight'],
      'en_name' => $credentials['en_name'],
      'abbr_name' => $credentials['abbr_name'],
      'language' => $credentials['language'],
      'evaludation' => $credentials['evaludation']
    ]);
  }
}
