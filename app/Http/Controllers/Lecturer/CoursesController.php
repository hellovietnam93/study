<?php

namespace studyhub\Http\Controllers\Lecturer;

use Illuminate\Http\Request;

use studyhub\Http\Requests;
use studyhub\Http\Controllers\Controller;
use studyhub\Repositories\Course\CourseRepositoryInterface as CourseRepo;
use studyhub\Repositories\StudyClass\StudyClassRepositoryInterface as StudyClassRepo;
use studyhub\Http\Requests\CourseRequest;

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
    return view('lecturer.courses.index', compact('courses'));
  }

  public function edit($id)
  {
    $course = $this->courseRepo->findById($id);
    return view('lecturer.courses.edit', compact('course'));
  }

  public function update(CourseRequest $request, $id)
  {
    $course = $this->courseRepo->update($request->all(), $id);
    flash()->info(trans('controller.course_updated', ['course' => $id]));
    return redirect()->route('lecturer::course.show', $id);
  }

  public function store(CourseRequest $request)
  {
    $course = $this->courseRepo->create($request->except(['_token', '_method']));
    // event(new TaskHasPublished($author, $task));
    flash()->success(trans('controller.course_created'));
    return redirect()->route('lecturer::courses');
  }

  public function create()
  {
    return view('lecturer.courses.create');
  }

  public function show($id)
  {
    $course = $this->courseRepo->findById($id);
    $classes = $this->studyclassRepo->fetchCourseUrgentClasses($course);
    return view('lecturer.courses.show', compact('course', 'classes'));
  }

  public function destroy($id)
  {
    $this->courseRepo->softDelete($id);
    flash()->info(trans('lecturer.course_trashed'));
    return back();
  }
}
