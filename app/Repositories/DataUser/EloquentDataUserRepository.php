<?php

namespace studyhub\Repositories\DataUser;

use studyhub\Entities\Users\DataUser;
use studyhub\Repositories\EloquentRepository;

class EloquentDataUserRepository extends EloquentRepository implements DataUserRepositoryInterface
{
  protected $model;

  public function __construct(DataUser $model)
  {
    $this->model = $model;
  }

  public function import(array $credentials)
  {
    if ($credentials['id'] != '') {
      $user = $this->model->where('id', $credentials['id'])->first();
      if (!$user) {
        return $this->model->create([
          'id' => $credentials['id'],
          'name' => "{$credentials['first_name']} {$credentials['middle_name']} {$credentials['last_name']}",
          'birthday' => date('Y-m-d', strtotime($credentials['birth_date'])),
          'class_name' => $credentials['class'],
          'program' => $credentials['program'],
          'status' => $credentials['status'],
          'cohort' => $credentials['cohort']
        ]);
      } else {
        return $user->update([
          'id' => $credentials['id'],
          'name' => "{$credentials['first_name']} {$credentials['middle_name']} {$credentials['last_name']}",
          'birthday' => date('Y-m-d', strtotime($credentials['birth_date'])),
          'class_name' => $credentials['class'],
          'program' => $credentials['program'],
          'status' => $credentials['status'],
          'cohort' => $credentials['cohort']
        ]);
      }
    }
    return;
  }
}
