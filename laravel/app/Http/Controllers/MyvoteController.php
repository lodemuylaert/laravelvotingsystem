<?php

namespace App\Http\Controllers;

use App\Models\Candidates;
use App\Models\Votes;
use App\User;
use App\Models\Parties;
use App\Models\Election;
use \Illuminate\Support\Facades\Auth as Auth;
use Carbon\Carbon;

class MyvoteController extends Controller
{
    public function index()
    {

//        $now = Carbon::now('Europe/Brussels');
//        if($now > Election::find(1)->startdate && $now < Election::find(1)->enddate){
//            $userid = Auth::user()->id;
//            $PartieWithCandidates = Parties::with('candidates')->get();
//            $userwithvote = User::find($userid)->vote;
//            return view('myvote.index', compact(['PartieWithCandidates', 'userwithvote']));
//        }else{
//            $votetime = Carbon::parse(Election::find(1)->startdate)->format('d/m/Y');
//            return view('myvote.out', compact('votetime'));;
//        }
        return view('myvote.index');
    }
    public function store(){

        $messages = array(
            'max' => array(
                'numeric' => 'Het aantal geselecteerde kandidaten mag niet groter zijn dan  :max .',
                'string'  => 'Het aantal geselecteerde partijen mag niet groter zijn dan  :max .'
            )
        );
        $rules = array(
            'partieheader' => 'max: 1',
            'candidates' => 'max: 10'
        );
        $this->validate(request(), $rules);

        //save new vote
        $candidates = request()->get('candidates');
        $partie = request()->get('partieheader');
        $userid = Auth::user()->id;


        if(User::find($userid)->vote){
            return redirect()->back();
        }else{
            if($candidates || $partie){
                if($candidates && !$partie){
                    //kandidaatstem
                    User::find($userid)->addvote($candidates, null);
                    //votes toekennen aan de kandidaten
                    foreach($candidates as $candidate)
                    {
                        $increment =  Candidates::where('name', $candidate);
                        $increment->increment('votes', 1);
                    }
                }else{
                    //partijstem
                    User::find($userid)->addvote(null, $partie);
                }
            }else{
               User::find($userid)->addvote(null, null);
            }
        }


        return redirect()->back();

    }


}
