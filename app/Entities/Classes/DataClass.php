<?php

namespace studyhub\Entities\Classes;

use Illuminate\Database\Eloquent\Model;

class DataClass extends Model
{
  protected $table = 'data_classes';
  protected $fillable = [
    'semester', 'student_id', 'class_id', 'class_type', 'course_id',
    'course_title', 'reg_status'
  ];
}
