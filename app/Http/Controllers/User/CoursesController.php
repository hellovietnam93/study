<?php

namespace studyhub\Http\Controllers\User;

use Illuminate\Http\Request;

use studyhub\Http\Requests;
use studyhub\Http\Controllers\Controller;
use studyhub\Repositories\Course\CourseRepositoryInterface as CourseRepo;
use studyhub\Repositories\StudyClass\StudyClassRepositoryInterface as StudyClassRepo;

class CoursesController extends Controller
{
  protected $courseRepo, $studyclassRepo;

  public function __construct(CourseRepo $courseRepo, StudyClassRepo $studyclassRepo)
  {
    $this->courseRepo = $courseRepo;
    $this->studyclassRepo = $studyclassRepo;
    $this->middleware('auth');

  }

  public function index()
  {
    $courses = $this->courseRepo->getAll();
    return view('user.courses.index', compact('courses'));
  }

  public function show($id)
  {
    $course = $this->courseRepo->findById($id);
    $classes = $this->studyclassRepo->fetchCourseUrgentClasses($course);
    return view('user.courses.show', compact('course', 'classes'));
  }
}
