<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('dashboard.user-dashboard');
    }
}
