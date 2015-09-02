<?php

namespace studyhub\Entities\Users;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, SluggableInterface
{
    use Authenticatable, CanResetPassword, SluggableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Unique slug for each user
     * 
     * @var mixed
     */
    protected $sluggable = ['build_from' => 'name', 'save_to' => 'slug'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'slug', 'status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'activation_token'];

    /**
     * A studyhub user can be a student, a lecturer, a staff, etc.
     * This gets all of the owning userable models.
     */
    public function userable()
    {
        return $this->morphTo();
    }

    /**
     * Each user has a profile
     * @return [type] [description]
     */
    public function profile()
    {
        return $this->hasOne('studyhub\Entities\Users\UserProfile');
    }
}
