<?php

namespace studyhub\Entities\Courses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
  use SoftDeletes;

  protected $table = 'courses';
  protected $fillable = [
  	'id', 'name', 'description', 'credit', 'credit_fee', 'theory_duration',
  	'exercise_duration', 'practice_duration', 'weight', 'en_name', 'abbr_name',
  	'coures_group', 'language', 'evaludation'
  ];
  protected $dates = ['deleted_at'];
  public function studyClass()
  {
  	return $this->hasMany(\studyhub\Entities\Classes\StudyClass::class);
  }

  public function user_class()
  {
    return $this->hasMany(\studyhub\Entities\UserCLass::class);
  }

  public function user_course()
  {
    return $this->hasMany(\studyhub\Entities\UserCourse::class);
  }
}
