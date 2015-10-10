<?php

namespace studyhub\Repositories\StudyClass;

interface StudyClassRepositoryInterface
{
  public function getAll();
  public function countAll();
  public function findById($id);
  public function update(array $data, $courseID, $id);
  public function create(array $data, $courseID);
  public function restore($slug);
  public function softDelete($courseID, $id);
  public function forceDelete($slug);
  public function fetchCourseUrgentClasses($course);
  public function findClassByCourse($course, $id);
}
