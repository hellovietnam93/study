<?php

namespace studyhub\Entities;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
  protected $table = 'semesters';
  protected $fillable = ['id'];

  public function studyClasses()
  {
    return $this->hasMany(\studyhub\Entities\Classes\StudyClass::class);
  }
}
