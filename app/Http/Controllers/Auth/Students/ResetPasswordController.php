<?php

namespace App\Http\Controllers\Auth\Students;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    protected $redirectTo = '/students';

    public function __construct()
    {
        $this->middleware('guest:students');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.students.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function broker()
    {
        return Password::broker('students');
    }

    protected function guard()
    {
        return Auth::guard('students');
    }
}
