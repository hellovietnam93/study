<?php

namespace studyhub\Http\Controllers\Admin;

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
    return view('admin.courses.index', compact('courses'));
  }

  public function edit($id)
  {
    $course = $this->courseRepo->findById($id);
    return view('admin.courses.edit', compact('course'));
  }

  public function update(CourseRequest $request, $id)
  {
    $course = $this->courseRepo->findById($id);
    $course = $this->courseRepo->update($request->all(), $course->id);
    flash()->info(trans('controller.course_updated', ['course' => $id]));
    return redirect()->route('admin::course.show', $id);
  }

  public function store(CourseRequest $request)
  {
    $course = $this->courseRepo->create($request->except(['_token', '_method']));
    // event(new TaskHasPublished($author, $task));
    flash()->success(trans('controller.course_created'));
    return redirect()->route('admin::courses');
  }

  public function create()
  {
    return view('admin.courses.create');
  }

  public function show($id)
  {
    $course = $this->courseRepo->findById($id);
    $classes = $this->studyclassRepo->fetchCourseUrgentClasses($course);
    return view('admin.courses.show', compact('course', 'classes'));
  }

  public function destroy($id)
  {
    $course = $this->courseRepo->findById($id);
    $this->courseRepo->softDelete($course->id);
    flash()->info(trans('admin.course_trashed'));
    return back();
  }
}
