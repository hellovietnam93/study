<?php

namespace studyhub\Http\Controllers\Lecturer;

use Illuminate\Http\Request;

use studyhub\Http\Requests;
use studyhub\Http\Controllers\Controller;
use studyhub\Repositories\Course\CourseRepositoryInterface as CourseRepo;
use studyhub\Repositories\StudyClass\StudyClassRepositoryInterface as StudyClassRepo;
use studyhub\Repositories\User\UserRepositoryInterface as UserRepo;
use studyhub\Http\Requests\ClassRequest;
use studyhub\Entities\Courses\Course;

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

        return view('lecturer.studyclasses.index', compact('course', 'classes'));
    }

    public function edit($courseID, $id)
    {
        $course = $this->courseRepo->findById($courseID);
        $class = $this->studyclassRepo->findClassByCourse($course, $id);

        return view('lecturer.studyclasses.edit', compact('course', 'class'));
    }

    public function update(ClassRequest $request, $courseID, $id)
    {
        $class = $this->studyclassRepo->update($request->all(), $courseID, $id);
        flash()->info(trans('controller.class_updated', ['class' => $id]));

        return redirect()->route('lecturer::course.show', $courseID);
    }

    public function store(ClassRequest $request, $courseID)
    {
        $class = $this->studyclassRepo->create($request->except(['_token', '_method']), $courseID);
        // event(new TaskHasPublished($author, $task));
        flash()->success(trans('controller.class_created'));
        return redirect()->route('lecturer::course.show', $courseID);
    }

    public function create($courseID)
    {
        $users = $this->userRepo->findLecturer()->lists('name', 'id');
        return view('lecturer.studyclasses.create', compact('courseID', 'users'));
    }

    public function show($courseID, $id)
    {
        $course = $this->courseRepo->findById($courseID);
        $class = $this->studyclassRepo->findClassByCourse($course, $id);

        return view('lecturer.studyclasses.show', compact('course', 'class'));
    }

    public function destroy($courseID, $id)
    {
        $this->studyclassRepo->softDelete($courseID, $id);
        flash()->info(trans('lecturer.class_trashed'));

        return back();
    }

    private function upload()
    {

    }
}
