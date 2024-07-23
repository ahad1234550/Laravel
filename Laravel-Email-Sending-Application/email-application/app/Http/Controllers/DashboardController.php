<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmailsImport;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        $userGroups = UserGroup::where('user_id', auth()->id())->get();
        return view('dashboard.index', compact('userGroups'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'group' => 'required|string',
            'file' => 'required|mimes:xlsx'
        ]);

        $group = UserGroup::create([
            'name' => $request->group,
            'user_id' => auth()->id(),
        ]);

        Excel::import(new EmailsImport($group->id), $request->file('file'));

        return redirect()->back()->with('success', 'Emails imported successfully.');
    }

    public function send(Request $request)
    {
        $request->validate([
            'group' => 'required|exists:user_groups,id',
            'subject' => 'required|string',
            'body' => 'required|string',
        ]);

        $emails = Email::where('user_group_id', $request->group)->pluck('email')->toArray();
        Mail::raw($request->body, function ($message) use ($request, $emails) {
            $message->to($emails)
                    ->subject($request->subject);
        });

        return redirect()->back()->with('success', 'Emails sent successfully.');
    }
}
