<?php

namespace studyhub\Http\Controllers\Admin;

use Illuminate\Http\Request;

use studyhub\Http\Requests;
use studyhub\Http\Controllers\Controller;
use studyhub\Repositories\Semester\SemesterRepositoryInterface as SemesterRepo;
use studyhub\Repositories\StudyClass\StudyClassRepositoryInterface as StudyClassRepo;

use studyhub\Http\Requests\SemesterRequest;

class SemestersController extends Controller
{
  protected $SemeterRepo;

  public function __construct(SemesterRepo $semesterRepo, StudyClassRepo $studyclassRepo)
  {
    $this->semesterRepo = $semesterRepo;
    $this->studyclassRepo = $studyclassRepo;
    $this->middleware('auth');
  }

  public function index()
  {
    $semesters = $this->semesterRepo->getAll();
    return view('admin.semesters.index', compact('semesters'));
  }

  public function edit($id)
  {
    $semester = $this->semesterRepo->findById($id);
    return view('admin.semesters.edit', compact('semester'));
  }

  public function update(SemesterRequest $request, $id)
  {
    $semester = $this->semesterRepo->findById($id);
    $semester = $this->semesterRepo->update($request->all(), $semester->id);
    flash()->info(trans('controller.semester_updated', ['semester' => $semester->id]));
    return redirect()->route('admin::semester.show', $semester->id);
  }

  public function store(SemesterRequest $request)
  {
    $semester = $this->semesterRepo->create($request->except(['_token', '_method']));
    // event(new TaskHasPublished($author, $task));
    flash()->success(trans('controller.semester_created'));
    return redirect()->route('admin::semesters');
  }

  public function create()
  {
    return view('admin.semesters.create');
  }

  public function show($id)
  {
    $semester = $this->semesterRepo->findById($id);
    $classes = $this->studyclassRepo->fetchSemesterUrgentClasses($semester->id);
    return view('admin.semesters.show', compact('semester', 'classes'));
  }

  public function destroy($id)
  {
    $semester = $this->semesterRepo->findById($id);
    $semester->delete();
    flash()->info(trans('admin.course_trashed'));
    return back();
  }
}
