<?php

namespace studyhub\Entities;

use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    protected $table = 'user_courses';
    protected $fillable = ['id', 'course_id', 'user_id'];

    public function user()
    {
      return $this->belongsTo('studyhub\Entities\Users\User');
    }

    public function course()
    {
      return $this->belongsTo('studyhub\Entities\Courses\Course');
    }
}
