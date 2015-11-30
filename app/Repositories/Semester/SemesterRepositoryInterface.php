<?php

namespace studyhub\Repositories\Semester;

interface SemesterRepositoryInterface
{
  public function getAll();
  public function countAll();
  public function findById($id);
  public function update(array $data, $id);
  public function create(array $data);
}
