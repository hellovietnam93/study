<?php
namespace studyhub\Uploads;
use Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon\Carbon;

abstract class AbstractUploader
{
  /**
   * Well... We need to read "some" characters of the input
   * file in order to "guess" the encoding type of the given
   * file. This value may need to be changed? Who know?
   */
  const CHARACTER_READ = 200;
  /**
   * Move file to destination folder.
   *
   * @param UploadedFile $file
   * @param $desiredPath
   * @return null|\Symfony\Component\HttpFoundation\File\File
   */
  public function moveFile(UploadedFile $file, $desiredPath)
  {
    $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    $time = Carbon::now()->format('Y_m_d_H_i_s');
    $extension = $file->getClientOriginalExtension();
    $new_file_name = "{$file_name}_{$time}"."."."{$extension}";
    return $file->move($desiredPath, $new_file_name);
  }
  /**
   * Upload file.
   *
   * @param $formKey
   * @param $path
   * @return null|\Symfony\Component\HttpFoundation\File\File
   */
  public function upload($formKey, $path)
  {
    $file = Request::file($formKey);
    return $this->moveFile($file, $path);
  }
}
