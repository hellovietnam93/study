<?php

namespace studyhub\Http\Controllers;

use Illuminate\Http\Request;

use studyhub\Http\Requests;
use studyhub\Http\Controllers\Controller;
use studyhub\Repositories\UserClass\UserClassRepositoryInterface as UserClassesRepo;
use studyhub\Repositories\Course\CourseRepositoryInterface as CourseRepo;
use studyhub\Repositories\StudyClass\StudyClassRepositoryInterface as StudyClassRepo;
use studyhub\Repositories\User\UserRepositoryInterface as UserRepo;

class EnrollsController extends Controller
{
  protected $userclassesRepo, $studyclassRepo, $courseRepo, $userRepo;

  public function __construct(UserClassesRepo $userclassesRepo, CourseRepo $courseRepo, StudyClassRepo $studyclassRepo, UserRepo $userRepo)
  {
    $this->userclassesRepo = $userclassesRepo;
    $this->courseRepo = $courseRepo;
    $this->studyclassRepo = $studyclassRepo;
    $this->userRepo = $userRepo;
  }

  public function create($courseID, $classID)
  {
    $course = $this->courseRepo->findById($courseID);
    $class = $this->studyclassRepo->findClassByCourse($course, $classID);
    if (auth()->user()->isLecturer()){
      if ($class->user_id == null){
        return view('enrolls.create', compact('course', 'class'));
      }
      return back();
    } else {
      if (!auth()->user()->checkUserInClass($class->id)){
        return view('enrolls.create', compact('course', 'class'));
      }
      return back();
    }
  }

  public function store(Request $request, $courseID, $classID)
  {
    $course = $this->courseRepo->findById($courseID);
    $class = $this->studyclassRepo->findClassByCourse($course, $classID);
    if ($request->key == $class->enroll_key)
    {
      if (auth()->user()->isLecturer())
        $this->studyclassRepo->updateLecturer($class, auth()->user());
      else
        $this->userclassesRepo->create($courseID, $classID, auth()->user()->id);
      // event(new TaskHasPublished($author, $task));
      flash()->success(trans('controller.enroll_success'));
      return redirect()->route('class.show', [$course->id, $class->id]);
    }

    flash()->error(trans('controller.enroll_failed'));
    return redirect()->back();
  }
}
