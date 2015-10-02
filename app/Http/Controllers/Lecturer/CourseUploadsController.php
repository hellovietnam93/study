<?php
namespace studyhub\Http\Controllers\Lecturer;

use Illuminate\Http\Request;

use studyhub\Http\Requests;
use studyhub\Http\Controllers\Controller;
use studyhub\Jobs\ImportCourseCSV;

class CourseUploadsController extends Controller
{

    public function store()
    {
        $path = public_path() . '/uploads';
        $this->dispatch(new ImportCourseCSV('csv-file', $path));
        flash()->success("Importing process completed.");
        return back();
    }
}
