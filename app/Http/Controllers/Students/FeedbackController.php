<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('students.feedback.feedback-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => 'required',
            "subject" => 'required',
            "message" => 'required',
        ]);
        $sendMail = Mail::to('test@test.com')->send(new FeedbackMail($request));
        dd($sendMail);
    }
}
