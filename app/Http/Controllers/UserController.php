<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getLogin()
    {
        return view('employer.login');
    }

    public function getRegister()
    {
        return view('employer.register');
    }
}
