<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;

class StudentsLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:students');
    }

    public function showLoginForm()
    {
        return view('auth.student-login');
    }

    public function login(Request $request)
    {
        //validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('students')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            return redirect()->intended(route('students.dashboard'));
        }
        $errors = new MessageBag(['email'=>[trans('auth.failed')]]);
        return redirect()->back()->withErrors($errors)->withInput(Input::except('password'));
    }
}
