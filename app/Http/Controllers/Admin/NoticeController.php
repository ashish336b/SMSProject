<?php

namespace App\Http\Controllers\Admin;

use App\Model\SendNotice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    public function index()
    {
        $allNoticeData = SendNotice::all();
        return view('admin.notice.index', ['allNoticeData' => $allNoticeData]);
    }

    public function create()
    {
        return view('admin.notice.add');
    }

    public function show($id)
    {
        $noticeData = SendNotice::where('id', $id)->first();
        return view('admin.notice.edit', ['noticeData' => $noticeData]);
    }

    public function edit(Request $request, $id)
    {
        $updateNotice = SendNotice::where("id", $id)->update([
            "to" => $request->to,
            'subject' => $request->subject,
            'message' => $request->message
        ]);
        if ($updateNotice) {
            return redirect(route('admin.notice'))->with("success", "Notice Updated Successfully");
        }
        return null;
    }

    public function store(Request $request)
    {
        $request->validate([
            'to' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:500'],
        ]);
        $createNotice = SendNotice::create([
            'to' => $request->to,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        if ($createNotice) {
            return redirect(route('admin.notice'))->with('success', "created Successfully");
        }
    }

    public function destroy($id)
    {
        if (SendNotice::where('id', $id)->delete()) {
            return redirect(route('admin.notice'))->with('danger', "Deleted Successfully");
        }
        return null;
    }
}
