<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Howcontroller extends Controller
{
    public function index()
    {
        return view('how.index');
    }
}
