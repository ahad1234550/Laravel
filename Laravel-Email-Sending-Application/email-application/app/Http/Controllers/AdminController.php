<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('approved', false)->get();
        return view('admin.index', compact('users'));
    }

    public function approveUser($id)
    {
        $user = User::find($id);
        $user->approved = true;
        $user->save();
        return redirect()->back()->with('success', 'User approved successfully.');
    }
}
