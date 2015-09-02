<?php

namespace studyhub\Entities\Users;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use studyhub\Entities\Presenters\Traits\PresentableTrait;
use studyhub\Entities\Presenters\Contracts\PresentableInterface;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, SluggableInterface
{
    use Authenticatable, CanResetPassword, SluggableTrait, SoftDeletes, EntrustUserTrait, PresentableTrait;

    protected $table = 'users';
    protected $dates = ['deleted_at'];
    protected $casts = ['active' => 'boolean'];
    protected $presenter = \studyhub\Entities\Presenters\UserPresenter::class;
    protected $sluggable = ['build_from' => 'name', 'save_to' => 'slug'];
    protected $fillable = ['name', 'email', 'password', 'slug', 'status',
    'activation_code', 'active'];
    protected $hidden = ['password', 'remember_token', 'activation_code'];

    /**
     * A studyhub user can be a student, a lecturer, a staff, etc.
     * This gets all of the owning userable models.
     */
    public function userable()
    {
        return $this->morphTo();
    }

    public function isActive()
    {
        return $this->active;
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getRouteKey()
    {
        return $this->slug;
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
