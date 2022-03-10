<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //tampilan Dashboard admin
    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function FunctionName(Type $var = null)
    {
        # code...
    }
}
