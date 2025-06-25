<?php

namespace App\Http\Controllers\Public\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\Auth\LoggedEvent;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/member/dashboard';

    public function __construct()
    {
        if (session()->has('url.intended')) {
            $this->redirectTo = session()->get('url.intended');
        }

        if (request()->isMethod('post') && (request()->query('from') && request()->query('from') == 'checkout')) {
            $this->redirectTo = '/checkout';
        }

        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'id';
    }

    public function showLoginForm()
    {
        if (str_contains(url()->previous(), 'membership-plans')) {
            session(['url.intended' => url()->previous()]);
        }

        if (str_contains(url()->previous(), 'tournaments')) {
            session(['url.intended' => url()->previous()]);
        }

        return view('public.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function authenticated()
    {
        $user = User::getAuthUser();
        event(new LoggedEvent(true, $user));
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = (object) $request->only(['id', 'password']);
        event(new LoggedEvent(false, $user));

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
}
