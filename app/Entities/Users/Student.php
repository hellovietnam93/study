<?php

namespace studyhub\Entities\Users;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 */
class Student extends Model
{
	/*
	 * Table used by the model
	 */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable
     * @var [type]
     */
    protected $fillable = ['cohort', 'program', 'class', 'school'];

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
    	return $this->morphOne('studyhub\Entities\Users\User', 'userable');
    }
}
