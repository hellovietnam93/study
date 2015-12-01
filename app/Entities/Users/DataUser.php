<?php

namespace studyhub\Entities\Users;

use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
  protected $table = 'data_users';
  protected $fillable = [
    'id', 'name', 'birthday', 'program', 'class_name', 'status', 'cohort'
  ];
}
