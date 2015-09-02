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
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request to the application.
     *
     * @param RegistrationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegister(RegistrationRequest $request)
    {
        if ($this->dispatchFrom(RegisterUserAccount::class, $request)) {
            flash()->info(trans('authentication.account_activation'));

            return redirect()->home();
        }

        return redirect()->route('auth::register');
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param InitializeSessionRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(InitializeSessionRequest $request)
    {
        if ($this->dispatchFrom(AuthenticateUser::class, $request, [
            'active'   => 1,
            'remember' => $request->has('remember'),])
        ) {
            flash()->success(trans('authentication.login_success'));

            return redirect()->intended('/');
        }
        session()->flash('login_error', trans('authentication.login_error'));

        return redirect()->route('auth::login')->withInput($request->only('email', 'remember'));
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth()->logout();
        flash()->success(trans('authentication.logout'));

        return redirect()->home();
    }

    /**
     * Activate user account.
     *
     * @param $code
     * @return \Illuminate\Http\RedirectResponse
     */
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
