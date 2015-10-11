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

class User extends Model implements AuthenticatableContract, CanResetPasswordContract,
  SluggableInterface
{
  use Authenticatable, CanResetPassword, SluggableTrait, SoftDeletes,
    EntrustUserTrait, PresentableTrait;

  protected $table = 'users';
  protected $dates = ['deleted_at'];
  protected $casts = ['active' => 'boolean'];
  protected $presenter = \studyhub\Entities\Presenters\UserPresenter::class;
  protected $sluggable = ['build_from' => 'name', 'save_to' => 'slug'];
  protected $fillable = ['name', 'email', 'password', 'slug', 'status',
    'activation_code', 'active'];
  protected $hidden = ['password', 'remember_token', 'activation_code'];

  public function userable()
  {
    return $this->morphTo();
  }

  public function isActive()
  {
    return $this->active;
  }

  public function isAdmin()
  {
    return $this->hasRole(['admin', 'owner']);
  }

  public function isLecturer()
  {
    return $this->hasRole(['lecturer']);
  }

  public function setPasswordAttribute($password)
  {
    $this->attributes['password'] = bcrypt($password);
  }

  public function getRouteKey()
  {
    return $this->slug;
  }

  public function classes()
  {
    return $this->hasMany(\studyhub\Entities\Classes\StudyClass::class);
  }

  public function user_class()
  {
    return $this->hasMany(\studyhub\Entities\UserClass::class);
  }

  public function user_course()
  {
    return $this->hasMany(\studyhub\Entities\UserCourse::class);
  }

  public function checkUserInClass($classID)
  {
    return $this->user_class()
      ->where('class_id', $classID)
      ->where('user_id', $this->id)
      ->exists();
  }
}
