<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class whoController extends Controller
{
    public function index()
    {
        return view('who.index');
    }
}
