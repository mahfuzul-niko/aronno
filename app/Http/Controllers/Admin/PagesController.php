<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard');
    }
    public function agentdashboard()
    {
        return view('backend.agent-dashboard');
    }
    public function profile()
    {
        // dd(auth()->user()->avatar);
        return view('backend.profile.profile');
    }
}
