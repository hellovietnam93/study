<?php

namespace studyhub\Http\Controllers;

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
  }

  public function index()
  {
    $courses = $this->courseRepo->getAll();
    return view('courses.index', compact('courses'));
  }

  public function show($id)
  {
    $course = $this->courseRepo->findById($id);
    $classes = $this->studyclassRepo->fetchCourseUrgentClasses($course);
    return view('courses.show', compact('course', 'classes'));
  }
}
