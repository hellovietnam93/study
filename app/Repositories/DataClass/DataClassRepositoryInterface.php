<?php

namespace studyhub\Repositories\DataClass;

interface DataClassRepositoryInterface
{
  public function getAll();
  public function countAll();
  public function import(array $credentials);
}
