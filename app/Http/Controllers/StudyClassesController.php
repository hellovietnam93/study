<?php

namespace studyhub\Http\Controllers;

use Illuminate\Http\Request;

use studyhub\Http\Requests;
use studyhub\Http\Controllers\Controller;
use studyhub\Repositories\Course\CourseRepositoryInterface as CourseRepo;
use studyhub\Repositories\StudyClass\StudyClassRepositoryInterface as StudyClassRepo;
use studyhub\Repositories\User\UserRepositoryInterface as UserRepo;
use studyhub\Repositories\Semester\SemesterRepositoryInterface as SemesterRepo;
use studyhub\Http\Requests\ClassRequest;

class StudyClassesController extends Controller
{
  protected $studyclassRepo, $courseRepo, $userRepo, $semesterRepo;

  public function __construct(CourseRepo $courseRepo, StudyClassRepo $studyclassRepo,
    UserRepo $userRepo, SemesterRepo $semesterRepo)
  {
    $this->courseRepo = $courseRepo;
    $this->studyclassRepo = $studyclassRepo;
    $this->userRepo = $userRepo;
    $this->semesterRepo = $semesterRepo;
  }

  public function index($courseID)
  {
    $course = $this->courseRepo->findById($courseID);
    $classes = $this->studyclassRepo->fetchCourseUrgentClasses($course);
    return view('studyclasses.index', compact('course', 'classes'));
  }

  public function edit($courseID, $id)
  {
    $course = $this->courseRepo->findById($courseID);
    $class = $this->studyclassRepo->findClassByCourse($course, $id);
    $semesters = $this->semesterRepo->getAll();
    return view('studyclasses.edit', compact('course', 'class', 'semesters'));
  }

  public function update(ClassRequest $request, $courseID, $id)
  {
    $course = $this->courseRepo->findById($courseID);
    $class = $this->studyclassRepo->update($request->all(), $course->id, $id);
    flash()->info(trans('controller.class_updated', ['class' => $id]));
    return redirect()->route('course.show', $courseID);
  }

  public function store(ClassRequest $request, $courseID)
  {
    $course = $this->courseRepo->findById($courseID);
    $request['user_id'] = auth()->user()->id;
    $class = $this->studyclassRepo->create($request->except(['_token', '_method']),
      $course->id);
    // event(new TaskHasPublished($author, $task));
    flash()->success(trans('controller.class_created'));
    return redirect()->route('course.show', $courseID);
  }

  public function create($courseID)
  {
    $course = $this->courseRepo->findById($courseID);
    $semesters = $this->semesterRepo->getAll();
    return view('studyclasses.create', compact('course', 'semesters'));
  }

  public function show($courseID, $id)
  {
    $course = $this->courseRepo->findById($courseID);
    $class = $this->studyclassRepo->findClassByCourse($course, $id);
    $users = $this->studyclassRepo->fetchUsers($class);
    return view('studyclasses.show', compact('course', 'class', 'users'));
  }

  public function destroy($courseID, $id)
  {
    $this->studyclassRepo->softDelete($courseID, $id);
    flash()->info(trans('lecturer.class_trashed'));
    return back();
  }
}
