<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
/* Changed */
class FeedbackController extends Controller
{
    public function index()
    {
        return view('students.feedback.feedback-form');
    }

    public function store(Request $request)
    {
        // dd(Auth::user());
        $request->validate([
            "email" => 'required',
            "subject" => 'required',
            "message" => 'required',
        ]);
        $dataToSend = [
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message,
            "firstName" => Auth::user()->firstName,
            "lastName" => Auth::user()->lastName,
        ];
        $sendMail = Mail::to('shrijanmalakar@gmail.com')->send(new FeedbackMail($dataToSend));
        return redirect(route('students.feedback'))->with('success', 'FeedBack Send Successfully');
    }
}
