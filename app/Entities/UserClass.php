<?php

namespace studyhub\Entities;

use Illuminate\Database\Eloquent\Model;

class UserClass extends Model
{
  protected $table = 'user_classes';
  protected $fillable = ['id', 'course_id', 'class_id', 'user_id', 'key'];

  public function studyClass()
  {
    return $this->belongsTo('studyhub\Entities\Classes\StudyClass');
  }

  public function user()
  {
    return $this->belongsTo('studyhub\Entities\Users\User');
  }

  public function course()
  {
    return $this->belongsTo('studyhub\Entities\Courses\Course');
  }
}
