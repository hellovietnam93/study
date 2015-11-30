<?php

namespace studyhub\Http\Controllers;
use studyhub\Repositories\Course\CourseRepositoryInterface as CourseRepo;
use studyhub\Repositories\StudyClass\StudyClassRepositoryInterface as StudyClassRepo;
use studyhub\Repositories\UserClass\UserClassRepositoryInterface as UserClassRepo;
use studyhub\Repositories\User\UserRepositoryInterface as UserRepo;

class HomeController extends Controller
{
  protected $courseRepo, $studyclassRepo, $userRepo, $userclassRepo;

  public function __construct(CourseRepo $courseRepo, StudyClassRepo $studyclassRepo,
    UserRepo $userRepo, UserClassRepo $userclassRepo)
  {
    $this->courseRepo = $courseRepo;
    $this->studyclassRepo = $studyclassRepo;
    $this->userRepo = $userRepo;
    $this->userclassRepo = $userclassRepo;
  }

  public function home() {
    if (auth()->guest()) {
      return view('dashboards.index');
    } else {
      $classes = $this->studyclassRepo->fetchAllClassOfLuctere(auth()->user());
      return view('dashboards.index', compact('classes'));
    }
  }
}
