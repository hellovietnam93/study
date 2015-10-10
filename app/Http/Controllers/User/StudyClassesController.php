<?php

namespace studyhub\Http\Controllers\User;

use Illuminate\Http\Request;

use studyhub\Http\Requests;
use studyhub\Http\Controllers\Controller;
use studyhub\Repositories\Course\CourseRepositoryInterface as CourseRepo;
use studyhub\Repositories\StudyClass\StudyClassRepositoryInterface as StudyClassRepo;
use studyhub\Repositories\User\UserRepositoryInterface as UserRepo;

class StudyClassesController extends Controller
{
    protected $courseRepo, $studyclassRepo, $userRepo;

    public function __construct(CourseRepo $courseRepo, StudyClassRepo $studyclassRepo, UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->courseRepo = $courseRepo;
        $this->studyclassRepo = $studyclassRepo;
        $this->middleware('auth');

    }

    public function index()
    {
        $course = $this->courseRepo->findById($courseID);
        $classes = $this->studyclassRepo->fetchCourseUrgentClasses($course);

        return view('user.studyclasses.index', compact('course', 'classes'));
    }

    public function show($courseID, $id)
    {
        $course = $this->courseRepo->findById($courseID);
        $class = $this->studyclassRepo->findClassByCourse($course, $id);
        $users = $this->userRepo->findUserInClass($class);

        return view('user.studyclasses.show', compact('course', 'class', 'users'));
    }
}
