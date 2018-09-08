<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models;


class PartiesController extends Controller
{
    public function index()
    {


        return view('parties.index');
    }
}
