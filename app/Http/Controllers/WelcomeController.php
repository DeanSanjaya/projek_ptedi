<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('first');
    }

    public function dashboard()
    {
        return view('home');
    }

}
