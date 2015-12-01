<?php
namespace studyhub\Jobs;

use studyhub\Uploads\CSVUploader;
use studyhub\Repositories\DataUser\DataUserRepositoryInterface as DataUserRepo;
use Illuminate\Contracts\Bus\SelfHandling;

class ImportDataUser extends Job implements SelfHandling
{
  protected $path;
  protected $formKey;
  public function __construct($formKey, $path)
  {
    $this->path = $path;
    $this->formKey = $formKey;
  }
  public function handle(CSVUploader $uploader, DataUserRepo $repository)
  {
    if ($uploader->import($uploader->upload($this->formKey, $this->path), $repository, $this->formKey))
      return true;
    else
      return false;
  }
}
