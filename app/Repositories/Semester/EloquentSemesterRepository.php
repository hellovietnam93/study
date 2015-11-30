<?php

namespace studyhub\Repositories\Semester;

use studyhub\Entities\Semester;
use studyhub\Repositories\EloquentRepository;

class EloquentSemesterRepository extends EloquentRepository implements SemesterRepositoryInterface
{
  protected $model;

  public function __construct(Semester $model)
  {
      $this->model = $model;
  }

  public function create(array $data)
  {
    return $this->model->create([
      'id' => $data['id']
    ]);
  }

  public function update(array $data, $id)
  {
    $semester = $this->findById($id);
    $semester->update($data);

    return $semester;
  }
}
