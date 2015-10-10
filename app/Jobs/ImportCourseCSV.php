<?php
namespace studyhub\Jobs;

use studyhub\Uploads\CSVUploader;
use studyhub\Repositories\Course\CourseRepositoryInterface as CourseRepo;
use Illuminate\Contracts\Bus\SelfHandling;

class ImportCourseCSV extends Job implements SelfHandling
{
  protected $path;
  protected $formKey;
  public function __construct($formKey, $path)
  {
    $this->path = $path;
    $this->formKey = $formKey;
  }
  public function handle(CSVUploader $uploader, CourseRepo $repository)
  {
    $uploader->import($uploader->upload($this->formKey, $this->path), $repository);
  }
}
