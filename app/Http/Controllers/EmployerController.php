<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class EmployerController extends Controller
{
    public function dashBoard()
    {
        return view('employer.dashboard.dashboard');
    }
}
