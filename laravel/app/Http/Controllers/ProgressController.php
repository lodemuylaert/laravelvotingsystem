<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function index()
    {
        $election = Election::where('id', 1)->first();
        $voted = Vote::count();
        return view('progress.index', compact('election', 'voted'));
    }
}
