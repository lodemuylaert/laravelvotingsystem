<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;



class AdminVotersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if($keyword != ''){
            $users = User::with('vote')->SearchByKeyword($keyword)->paginate(15);
            $users->withPath('stemmers?keyword=' . strtolower($keyword));
        }else{
            $users = User::with('vote')->sortable()->paginate(15);
        }
        return view('backoffice.voters.index', compact('users','keyword'));

    }
    public function create()
    {
        session()->forget('statusberichtfail');
        session()->forget('statusbericht');
        return view('backoffice.voters.create');
    }
    public function store(Request $request)
    {
        session()->forget('statusberichtfail');
        session()->forget('statusbericht');
        //validatie
        $dt = new Carbon();
        $before = $dt->subYears(18)->format('d-m-Y');
        $geboortejaar =  substr($request->geboortedatum, 2, 2);
        $this->validate($request, array(
            'naam' => 'required|max:20',
            'email' => 'required|email',
            'rijksregister' => 'required|min:11|regex:/^('.$geboortejaar.')[.][0-9]{2}[.][0-9]{2}[-][0-9]{3}[.][0-9]{2}/',
            'geboortedatum' => 'required|max:10|date|before_or_equal:' .$before
        ));
        $name = $request->naam;
        $email = $request->email;
        $rijksregister = $request->rijksregister;
        $geboortedatum = $request->geboortedatum;
        if(!User::where('email','=', $email)->first()){
            if($name && $email) {
                $password = str_random(5);
                $voter = new User();
                $voter->name = $name;
                $voter->email = $email;
                $voter->rijksregister = $rijksregister;
                $voter->birth =$geboortedatum;
                $voter->password = bcrypt($password);
                $voter->remember_token = str_random(10);
                $voter->voterroles_id = 3; //administrators kunnen enkel door de super admin (schrijver van dit programma worden toegevoegd)
                $voter->save();
            }else{
                $message =  'Voter kan niet worden toegevoegd aangezien deze partij reeds 30 kandidaten bevat.';
                session()->flash('statusberichtfail', $message);
                return redirect()->route('admin.stemmers');
            }
            $message = 'U hebt ' . $name. ' toegevoegd';
            session()->flash('statusbericht', $message);
            return view('backoffice.voters.confirm', compact('voter', 'password'));
        }else{
            $message = 'Het emailadres ' . $email. ' is reeds in gebruik genomen';
            session()->flash('statusberichtfail', $message);
            return view('backoffice.voters.create');
        }

    }



}
