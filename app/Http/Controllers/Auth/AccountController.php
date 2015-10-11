<?php

namespace studyhub\Http\Controllers\Auth;

use studyhub\Jobs\ModifyUserName;
use studyhub\Jobs\ModifyUserPassword;
use studyhub\Http\Controllers\Controller;
use studyhub\Http\Requests\ModifyPasswordRequest;
use studyhub\Http\Requests\ModifyUsernameRequest;
use studyhub\Repositories\User\UserRepositoryInterface as UserRepo;

class AccountController extends Controller
{
  protected $userRepo;

  public function __construct(UserRepo $userRepo)
  {
    $this->userRepo = $userRepo;
    $this->middleware('auth');
  }

  public function changePassword($userSlug, ModifyPasswordRequest $request)
  {
    if ($this->dispatchFrom(ModifyUserPassword::class, $request, [
      'user' => $this->userRepo->findBySlug($userSlug),]))
    {
      session()->flash('update_password_success', trans('authentication.updated_password_success'));
      return back();
    }
    session()->flash('update_password_error', trans('authentication.update_password_error'));
    return back();
  }

  public function changeUsername($userSlug, ModifyUsernameRequest $request)
  {
      $user = $this->userRepo->findBySlug($userSlug);
      if ($this->dispatchFrom(ModifyUserName::class, $request, ['user' => $user])) {
        session()->flash('update_username_success', trans('authentication.update_username_success'));
        return redirect()->route('member::profile', $user);
      }
      session()->flash('update_username_error', trans('authentication.update_username_error'));
      return back();
  }
}
