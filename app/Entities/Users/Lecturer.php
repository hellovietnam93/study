<?php

namespace studyhub\Entities\Users;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lecturer
 */
class Lecturer extends Model
{
    /*
	 * Table used by the model
	 */
    protected $table = 'lecturers';

    /**
     * The attributes that are mass assignable
     * @var [type]
     */
    protected $fillable = ['title', 'department', 'school', 
    					   'office_address', 'work_email', 'telephone'];

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
    	return $this->morphOne('studyhub\Entities\Users\User', 'userable');
    }
}
