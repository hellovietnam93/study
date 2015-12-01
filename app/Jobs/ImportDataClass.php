<?php
namespace studyhub\Jobs;

use studyhub\Uploads\CSVUploader;
use studyhub\Repositories\DataClass\DataClassRepositoryInterface as DataClassRepo;
use Illuminate\Contracts\Bus\SelfHandling;

class ImportDataClass extends Job implements SelfHandling
{
  protected $path;
  protected $formKey;
  public function __construct($formKey, $path)
  {
    $this->path = $path;
    $this->formKey = $formKey;
  }
  public function handle(CSVUploader $uploader, DataClassRepo $repository)
  {
    return $uploader->import($uploader->upload($this->formKey, $this->path), $repository);
  }
}
