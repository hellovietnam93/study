<?php

namespace studyhub\Http\Controllers\User;

use studyhub\Http\Controllers\Controller;
use studyhub\Repositories\Course\CourseRepositoryInterface as CourseRepo;
use studyhub\Repositories\StudyClass\StudyClassRepositoryInterface as StudyClassRepo;
use studyhub\Repositories\UserClass\UserClassRepositoryInterface as UserClassRepo;
use studyhub\Repositories\User\UserRepositoryInterface as UserRepo;

class DashboardsController extends Controller
{
  protected $courseRepo, $studyclassRepo, $userRepo, $userclassRepo;

  public function __construct(CourseRepo $courseRepo, StudyClassRepo $studyclassRepo,
    UserRepo $userRepo, UserClassRepo $userclassRepo)
  {
    $this->courseRepo = $courseRepo;
    $this->studyclassRepo = $studyclassRepo;
    $this->userRepo = $userRepo;
    $this->userclassRepo = $userclassRepo;
    $this->middleware('auth');
  }

  public function index()
  {
    $classes = $this->userRepo->fetchClasses(auth()->user());
    return view('user.dashboards.index', compact('classes'));
  }
}
