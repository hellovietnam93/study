<?php
namespace studyhub\Uploads;

use Excel;
use studyhub\Exceptions\MethodNotFoundException;
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
        $encode = $this->getEncoding($file);
        Excel::filter('chunk')
            ->load($file->getPathname(), $encode)
            ->chunk(100, function ($reader) use ($repository, $encode) {
                if (!method_exists($repository, 'create')) {
                    throw new MethodNotFoundException;
                }
                if ($encode === 'UTF-8') {
                    $reader->each(function ($userData) use ($repository) {
                        $repository->create($userData->toArray());
                    });
                } else {
                    $reader->each(function ($userData) use ($repository) {
                        $repository->create($this->convertToUTF8($userData->toArray()));
                    });
                }
            });
    }
}
