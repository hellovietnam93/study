<?php

namespace studyhub\Repositories\DataUser;

interface DataUserRepositoryInterface
{
  public function getAll();
  public function countAll();
  public function findById($id);
  public function import(array $credentials);
}
