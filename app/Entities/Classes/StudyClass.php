<?php

namespace studyhub\Entities\Classes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyClass extends Model
{
    use SoftDeletes;

    protected $table = 'classes';

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'id', 'name', 'type', 'description', 'semester',
    	'max_student', 'registered_student', 'course_id'
    ];

    /**
     * Each class only belongs to one course
     * @return [type] [description]
     */
    public function course()
    {
    	return $this->belongsTo('studyhub\Entities\Courses\Course');
    }
}
