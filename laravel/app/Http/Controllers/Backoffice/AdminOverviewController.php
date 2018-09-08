<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Candidates;
use App\Models\Election;
use App\Models\Parties;
use App\Models\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOverviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        session()->forget('statusberichtfail');
        session()->forget('statusbericht');
        $candidates = Candidates::all();

     $parties = Parties::all();
     $amountofvotes = Vote::all()->count();
     $maxamountofvotes = Election::first()->maxvoters;
     $percentagetotal = ($amountofvotes/$maxamountofvotes)*100;
     $votes = Vote::all();


     return view('backoffice.overview.index', compact('parties', 'amountofvotes', 'maxamountofvotes', 'percentagetotal', 'votes', 'candidates'));
    }
}
