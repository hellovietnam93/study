<?php
namespace studyhub\Http\Controllers\Admin;

use Illuminate\Http\Request;
use studyhub\Http\Requests;
use studyhub\Http\Controllers\Controller;
use studyhub\Jobs\ImportDataUser;
use studyhub\Jobs\ImportDataClass;
use Carbon\Carbon;
use studyhub\Services\FlashedMessage;

class DataUsersController extends Controller
{
  const CLASS_FAILS = 'Import classes fails';
  const CLASS_SUCCESS = 'Import classes successful';
  const USER_FAILES = 'Import users fails';
  const USER_SUCCESS = 'Import users successful';
  const NO_FILE = 'No file select';

  public function store(Request $request)
  {
    $successMessages = [];
    $failureMessages = [];
    $flasher = app(FlashedMessage::class);

    $data_models = ['users', 'classes'];
    foreach ($data_models as $type) {
      if ($request->hasFile($type)) {
        $file = $request->file($type);
        if ($file->isValid() && $this->is_csv($file) && $this->check_header($file, $type)) {
          $path = public_path() . '/imports/' . $type;
          if ($type == "users") {
            $this->dispatch(new ImportDataUser($type, $path));
            $successMessages[] = self::USER_SUCCESS;
          } else{
            $this->dispatch(new ImportDataClass($type, $path));
            $successMessages[] = self::CLASS_SUCCESS;
          }
        } else {
          $failureMessages[] = $type == "users" ? self::USER_FAILES : self::CLASS_FAILS;
        }
      } else {
        $failureMessages[] = self::NO_FILE;
      }
    }

    if (!empty($successMessages)) {
      $flasher->push(implode(', ', array_unique($successMessages)), FlashedMessage::SUCCESS);
    }

    if (!empty($failureMessages)) {
      $flasher->push(implode(', ', array_unique($failureMessages)), FlashedMessage::DANGER);
    }

    $flasher->flashMessages();

    return back();
  }

  public function index()
  {
    return view('admin.users.index');
  }

  private function is_csv($file)
  {
    return $file->getClientOriginalExtension() == "csv";
  }

  private function check_header($file, $type)
  {
    $handle = fopen($file, 'r');
    $header = fgetcsv($handle, 1000, ',');

    return $type == "users" ? in_array("id", $header) : in_array("student_id", $header);
  }
}
