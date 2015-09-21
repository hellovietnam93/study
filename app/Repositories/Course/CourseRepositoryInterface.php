<?php

namespace studyhub\Repositories\Course;

interface CourseRepositoryInterface
{
    public function getAll();
    public function countAll();
    public function findBySlug($slug);
    public function findById($id);
    public function create(array $credentials);
    public function update(array $data, $id);
    public function restore($slug);
    public function softDelete($id);
    public function forceDelete($slug);
    public function findDisabledCourseBySlug($slug);
}
