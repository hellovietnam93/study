<?php

namespace studyhub\Http\Controllers\Admin;

use studyhub\Http\Controllers\Controller;
use studyhub\Repositories\User\UserRepositoryInterface as UserRepo;

class DashboardController extends Controller
{
  protected $users;

  public function __construct(UserRepo $userRepo)
  {
    $this->users = $userRepo;
  }

  public function dashboard()
  {
    $usersCount = $this->users->countAll();

    return view('admin.dashboard', compact('usersCount'));
  }
}
