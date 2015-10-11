<?php

namespace studyhub\Entities;

use Illuminate\Database\Eloquent\Model;
use studyhub\Entities\Classes\StudyClass;

class UserClass extends Model
{
  protected $table = 'user_classes';
  protected $fillable = ['id', 'course_id', 'class_id', 'user_id', 'key'];

  public static function boot()
  {
    parent::boot();
    static::created(function ($model) {
      $class = StudyClass::find($model->class_id);
      if ($class) {
        if ($class->registered_student == null) {
          $class->registered_student = 1;
          $class->save();
        }
        else {
          $class->update([
            'registered_student' => $class->registered_student + 1
          ]);
        }
      }
    });
  }

  public function studyClass()
  {
    return $this->belongsTo(\studyhub\Entities\Classes\StudyClass::class);
  }

  public function user()
  {
    return $this->belongsTo(\studyhub\Entities\Users\User::class);
  }

  public function course()
  {
    return $this->belongsTo(\studyhub\Entities\Courses\Course::class);
  }
}
