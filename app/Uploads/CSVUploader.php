<?php
namespace studyhub\Uploads;

use Excel;
use studyhub\Exceptions\MethodNotFoundException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
// use Illuminate\Support\Facades\File;
use Storage;
use File;
class CSVUploader extends AbstractUploader
{
  /**
   * Extract data CSV and import into database.
   *
   * @param $file
   * @param $repository
   */
  public function import($file, $repository)
  {
    Excel::filter('chunk')
      ->load($file->getPathname())
      ->chunk(250, function ($reader) use ($repository) {
        if (!method_exists($repository, 'import')) {
          throw new MethodNotFoundException;
        }

        $reader->each(function ($userData) use ($repository) {
          $repository->import($userData->toArray());
        });
      });
  }
}
