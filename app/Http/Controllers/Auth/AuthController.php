<?php

namespace studyhub\Http\Controllers\Auth;

use studyhub\Jobs\AuthenticateUser;
use studyhub\Jobs\RegisterUserAccount;
use studyhub\Jobs\ActivateUserAccount;
use studyhub\Http\Controllers\Controller;
use studyhub\Http\Requests\RegistrationRequest;
use studyhub\Http\Requests\InitializeSessionRequest;

class AuthController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest', ['except' => 'logout']);
  }

  public function getRegister()
  {
    return view('auth.register');
  }

  public function postRegister(RegistrationRequest $request)
  {
    if ($this->dispatchFrom(RegisterUserAccount::class, $request)) {
      flash()->info(trans('authentication.account_activation'));
      return redirect()->home();
    }
    return redirect()->route('auth::register');
  }

  public function getLogin()
  {
    return view('auth.login');
  }

  public function postLogin(InitializeSessionRequest $request)
  {
    if ($this->dispatchFrom(AuthenticateUser::class, $request, [
      'active'   => 1,
      'remember' => $request->has('remember'),]))
    {
      flash()->success(trans('authentication.login_success'));
      return redirect()->intended('/');
    }
    session()->flash('login_error', trans('authentication.login_error'));
    return redirect()->route('auth::login')->withInput($request->only('email', 'remember'));
  }

  public function logout()
  {
    auth()->logout();
    flash()->success(trans('authentication.logout'));
    return redirect()->home();
  }

  public function activate($code)
  {
    if ($this->dispatch(new ActivateUserAccount($code))) {
      flash()->success(trans('authentication.activation_success'));
      return redirect()->home();
    }
    flash()->warning(trans('authentication.activation_error'));
    return redirect()->home();
  }
}
