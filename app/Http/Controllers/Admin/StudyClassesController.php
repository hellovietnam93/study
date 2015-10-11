<?php

namespace studyhub\Http\Controllers\Admin;

use Illuminate\Http\Request;

use studyhub\Http\Requests;
use studyhub\Http\Controllers\Controller;
use studyhub\Repositories\Course\CourseRepositoryInterface as CourseRepo;
use studyhub\Repositories\StudyClass\StudyClassRepositoryInterface as StudyClassRepo;
use studyhub\Repositories\User\UserRepositoryInterface as UserRepo;
use studyhub\Http\Requests\ClassRequest;

class StudyClassesController extends Controller
{
  protected $studyclassRepo, $courseRepo, $userRepo;

  public function __construct(CourseRepo $courseRepo, StudyClassRepo $studyclassRepo, UserRepo $userRepo)
  {
    $this->courseRepo = $courseRepo;
    $this->studyclassRepo = $studyclassRepo;
    $this->userRepo = $userRepo;
    $this->middleware('auth');
  }

  public function index($courseID)
  {
    $course = $this->courseRepo->findById($courseID);
    $classes = $this->studyclassRepo->fetchCourseUrgentClasses($course);
    return view('admin.studyclasses.index', compact('course', 'classes'));
  }

  public function edit($courseID, $id)
  {
    $course = $this->courseRepo->findById($courseID);
    $class = $this->studyclassRepo->findClassByCourse($course, $id);
    return view('admin.studyclasses.edit', compact('course', 'class'));
  }

  public function update(ClassRequest $request, $courseID, $id)
  {
    $course = $this->courseRepo->findById($courseID);
    $class = $this->studyclassRepo->update($request->all(), $course->id, $id);
    flash()->info(trans('controller.class_updated', ['class' => $id]));
    return redirect()->route('admin::course.show', $course->id);
  }

  public function store(ClassRequest $request, $courseID)
  {
    $course = $this->courseRepo->findById($courseID);
    $class = $this->studyclassRepo->create($request->except(['_token', '_method']), $course->id);
    // event(new TaskHasPublished($author, $task));
    flash()->success(trans('controller.class_created'));
    return redirect()->route('admin::course.show', $course->id);
  }

  public function create($courseID)
  {
    $course = $this->courseRepo->findById($courseID);
    return view('admin.studyclasses.create', compact('course'));
  }

  public function show($courseID, $id)
  {
    $course = $this->courseRepo->findById($courseID);
    $class = $this->studyclassRepo->findClassByCourse($course, $id);
    return view('admin.studyclasses.show', compact('course', 'class'));
  }

  public function destroy($courseID, $id)
  {
    $course = $this->courseRepo->findById($courseID);
    $this->studyclassRepo->softDelete($course->id, $id);
    flash()->info(trans('admin.class_trashed'));
    return back();
  }
}
