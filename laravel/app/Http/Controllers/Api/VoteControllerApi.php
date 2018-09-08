<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Parties;
use App\Models\Election;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Candidates;

class VoteControllerApi extends Controller
{
    /**
     * @param int $user_id
     * @param int $vote_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $user_id)
    {
        //tijd bepalen voor te zien of je mag voten
        $now = Carbon::now('Europe/Brussels');
        $PartieWithCandidates = Parties::with('candidates')->get();
        //kijken of je mag voten
        if($now > Election::find(1)->startdate && $now < Election::find(1)->enddate){
        //toegestaan om te stemmen
            $userid = $user_id;
            $uservote = User::find($userid)->vote;
            $object = response()->json([
                    'data' =>  $PartieWithCandidates,
                    'userid' => $userid,
                    'vote' => $uservote,
                    'message' => null
                ]
            );
        }else{
            //niet toegestaan om te stemmen (binnen juiste tijd)
            $votetimestart = Carbon::parse(Election::find(1)->startdate)->format('d/m/Y');
            $votetimeend = Carbon::parse(Election::find(1)->enddate)->format('d/m/Y');
            $message =  "Je kan maar voten tussen " . $votetimestart . " en " . $votetimeend;
            $object = response()->json([
                'data' => null,
                'message' => $message
                ]
            );
        }

        return $object;




    }
    public function store(Request $request){
        if($request){
            $userid = $request->userid;
            $partie = $request->partie;
            $candidates = $request->candidates;
            //save vote
            if(User::find($userid)->vote){
                //reeds gestemd
                return redirect()->back();
            }else{
                if($candidates || $partie){
                    if($candidates && !$partie){
                        //kandidaatstem
//                    $candidatesconverted = implode(",", $candidates);
                        User::find($userid)->addvote($candidates, null);
                        //votes toekennen aan de kandidaten
                        foreach($candidates as $candidate)
                        {
                            $increment =  Candidates::where('name', $candidate);
                            $increment->increment('votes', 1);
                        }
                    }else{
                        //partijstem
//                    $partieconverted = implode($partie);
                        User::find($userid)->addvote(null, $partie[0]);
                    }
                }else{
                    //blancostem
                    User::find($userid)->addvote(null, null);
                }
            }
            return ['redirect' => route('home'), 'message' => 'je stem werd geregistreerd'];
        }else{
            return ['redirect' => route('training_schedules.index'), 'message' => 'je stem is niet geregistreerd'];
        }




    }
}
