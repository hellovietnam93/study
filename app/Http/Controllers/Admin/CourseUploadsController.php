<?php
namespace studyhub\Http\Controllers\Admin;

use Illuminate\Http\Request;
use studyhub\Http\Requests;
use studyhub\Http\Controllers\Controller;
use studyhub\Jobs\ImportCourse;

class CourseUploadsController extends Controller
{
  public function store()
  {
    $path = public_path() . '/uploads/courses';
    $this->dispatch(new ImportCourse('csv-file', $path));
    flash()->success("Importing process completed.");
    return back();
  }
}
