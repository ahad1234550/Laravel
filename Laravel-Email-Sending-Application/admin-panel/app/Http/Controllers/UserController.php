<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function activate($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->active = 1;
        $user->save();

        return redirect()->back()->with('status', "User ID {$user->id} has been activated.");
    }
}
