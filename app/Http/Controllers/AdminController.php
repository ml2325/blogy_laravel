<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    // ...
    
    public function index()
    {
        // Add logic to handle the admin dashboard
        return view('admin.dashboard');
    }
}
