<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/teachers/notice';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $redirectUrl = "admin/login";
            Auth::guard('admin')->logout();
        } else if (Auth::guard('students')->check()) {
            $redirectUrl = "students/login";
            Auth::guard('students')->logout();
        } else {
            $redirectUrl = "/login";
            $this->guard()->logout();
        }

        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect($redirectUrl);
    }
}
