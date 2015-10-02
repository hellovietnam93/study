<?php
namespace studyhub\Uploads;
use Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
        if ($file->isValid()) {
            return $file->move($desiredPath, $file->getClientOriginalName());
        }
        return null;
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
    /**
     * Detect file encoding type.
     *
     * @param $string
     * @return string
     */
    protected function detectEncoding($string)
    {
        return mb_detect_encoding($string, mb_list_encodings());
    }
    /**
     * Get file encoding type.
     *
     * @param $file
     * @return string
     */
    protected function getEncoding($file)
    {
        return $this->detectEncoding(file_get_contents(
            $file, null, null, null, self::CHARACTER_READ
        ));
    }
    /**
     * Convert the given input (string, array, or object)
     * to UTF-8 format.
     *
     * @param $input
     * @return string
     */
    protected function convertToUTF8($input)
    {
        if (is_string($input)) {
            $input = utf8_encode($input);
        } else if (is_array($input)) {
            foreach ($input as &$value) {
                $this->convertToUTF8($value);
            }
            unset($value);
        } else if (is_object($input)) {
            $vars = array_keys(get_object_vars($input));
            foreach ($vars as $var) {
                $this->convertToUTF8($input->$var);
            }
        }
        return $input;
    }
}
