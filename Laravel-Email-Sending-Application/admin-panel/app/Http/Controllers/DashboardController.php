<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $activeUsers = User::where('active', 1)->get();
        $inactiveUsers = User::where('active', 0)->get();

        return view('dashboard', compact('activeUsers', 'inactiveUsers'));
    }
}

