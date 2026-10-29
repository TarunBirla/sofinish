<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show Frontend Home Page
     */
    public function index()
    {
        return view('home');
    }
}
