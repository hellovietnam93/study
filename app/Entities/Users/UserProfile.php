<?php

namespace studyhub\Entities\Users;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    /**
     * The table used by the model
     * @var string
     */
    protected $table = 'user_profile';

    /**
     * The attributes that are mass assignable
     * @var [type]
     */
    protected $fillable = [
    	'first_name', 'middle_name', 'last_name', 'display_name',
    	'gender', 'email', 'address', 'telephone', 'avatar', 'birth_date',
    	'language', 'country', 'about'
    ];

    /**
     * Each profile belongs only to one user
     * @return [type] [description]
     */
    public function user()
    {
    	return $this->belongsTo('studyhub\Entities\Users\User', 'id', 'profile_id');
    }
}
