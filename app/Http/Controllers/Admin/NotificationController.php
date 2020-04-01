<?php

namespace App\Http\Controllers\Admin;

use App\Model\SendNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        $allNotificationData = SendNotification::all();
        return view('admin.notification.index', ['allNotificationData' => $allNotificationData]);
    }

    public function create()
    {
        return view('admin.notification.add');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $validateData = $request->validate([
            'to' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:500'],
        ]);
        $createNotification = SendNotification::create([
            'to' => $request->to,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        if ($createNotification) {
            return redirect(route('admin.notification'))->with('success', "created Successfully");
        }
    }

    public function destroy($id)
    {
        if (SendNotification::where('id', $id)->delete()) {
            return redirect(route('admin.notification'))->with('danger', "Deleted Successfully");
        }
    }
}
