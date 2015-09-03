<?php

namespace studyhub\Entities\Courses;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model implements SluggableInterface
{
    use SluggableTrait, SoftDeletes;

    protected $table = 'courses';

    protected $sluggable = ['build_from' => 'name', 'save_to', 'slug'];

    protected $fillable = [
    	'id', 'name', 'description', 'credit', 'credit_fee', 'theory_duration',
    	'exercise_duration', 'practice_duration', 'weight', 'en_name', 'abbr_name',
    	'coures_group', 'language', 'evaludation'
    ];

    protected $dates = ['deleted_at'];

    /**
     * A course can have many classes
     * @return [type] [description]
     */
    public function studyClass()
    {
    	return $this->hasMany('studyhub\Entities\Classes\StudyClass');
    }
}
