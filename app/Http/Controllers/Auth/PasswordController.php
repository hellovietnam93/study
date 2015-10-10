<?php

namespace studyhub\Http\Controllers\Auth;

use Illuminate\Http\Request;
use studyhub\Http\Controllers\Controller;
use studyhub\Http\Requests\ResetPasswordRequest;
use Illuminate\Contracts\Auth\PasswordBroker;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordController extends Controller
{
  protected $passwords, $subject;

  public function __construct(PasswordBroker $passwords)
  {
    $this->passwords = $passwords;
    $this->subject = trans('authentication.password_reset_email_subject');
    $this->middleware('guest');
  }

  public function getEmail()
  {
    return view('auth.password');
  }

  public function postEmail(Request $request)
  {
    $this->validate($request, ['email' => 'required|email']);
    $response = $this->passwords->sendResetLink($request->only('email'), function ($message) {
      $message->subject($this->subject);
    });
    if ($response == PasswordBroker::RESET_LINK_SENT) {
      flash()->success(trans('authentication.password_reset_email'));
      return redirect()->home();
    }
    return back()->withErrors(['email' => trans($response)]);
  }

  public function getReset($token = null)
  {
    if (is_null($token)) {
      throw new NotFoundHttpException();
    }
    return view('auth.reset')->with('token', $token);
  }

  public function postReset(ResetPasswordRequest $request)
  {
    $credentials = $request->only('email', 'password', 'password_confirmation', 'token');
    $response = $this->passwords->reset($credentials, function ($user, $password)
    {
      $user->password = $password;
      $user->save();
      auth()->login($user);
    });
    if ($response == PasswordBroker::PASSWORD_RESET) {
      flash()->success(trans('authentication.password_reset'));
      return redirect()->home();
    }
    return back()
      ->withInput($request->only('email'))
      ->withErrors(['email' => trans($response)]);
  }
}
