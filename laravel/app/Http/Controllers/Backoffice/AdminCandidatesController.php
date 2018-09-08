<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Candidates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Parties;



class AdminCandidatesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function create(Request $request)
    {
        $partij = Parties::get()->where('name', $request->partie)->first();
        $partijen = Parties::all()->where('name', '!=', $request->partie);
        return view('backoffice.candidates.index', compact('partij', 'partijen'));

    }
    public function store(Request $request)
    {
        session()->forget('statusberichtfail');
        session()->forget('statusbericht');
        $this->validate($request, array(
            'partijnaam' => 'required|max:50',
            'kandidaatnaam' => 'required'
        ));

        $id = $request->partijnaam;
        $kandidaat = $request->kandidaatnaam;
        $amountofcandidates = Candidates::where('parties_id', '=', $id )->count();
        if($id && $kandidaat){
              if($amountofcandidates  < 30){
                $newcandidate = new Candidates;
                $newcandidate->positionid = 5;
                $newcandidate->name = $kandidaat;
                $newcandidate->votes = 0;
                $newcandidate->parties_id = $id;
                $newcandidate->deleted = false;
                $newcandidate->save();
            }else{
                $message =  $kandidaat . ' kan niet worden toegevoegd aangezien deze partij reeds 30 kandidaten bevat.';
                session()->flash('statusberichtfail', $message);
            }
            $message = 'U hebt ' . $kandidaat. ' toegevoegd';
            session()->flash('statusbericht', $message);
        }else{
            $message = 'Kandidaat ' . $kandidaat. ' is niet toegevoegd';
            session()->flash('statusberichtfail', $message);
        }

        return redirect()->route('admin.partijen');
       //

    }
    public function edit($id)
    {

        if($id){
            $candidate = Candidates::find($id);
        }else{
            return redirect()->route('admin.partijen');
        }


     return view('backoffice.candidates.edit', compact('candidate'));
    }
    public function update(Request $request, $id)
    {
        $originalename = Candidates::find($id)->name;
        $name = $request->naam;
        $this->validate($request, array(
            'naam' => 'required|max:50'
        ));

        $update = Candidates::find($request->id);
        $update->update(['name' => $name]);

        $message = 'U hebt de kandidaat met de naam ' . $originalename .  ' veranderd naar ' . $name;
        session()->flash('statusbericht', $message);
        return redirect()->route('admin.partijen');
    }
    public function delete($id)
    {
        if($id){
            $candidate = Candidates::find($id);
        }else{
            return redirect()->route('admin.partijen');
        }

        return view('backoffice.candidates.delete', compact('candidate'));
    }
    public function destroy(Request $request, $id)
    {
        $candidate = Candidates::find($id);
        $name = Candidates::find($id)->name;
        if($candidate->delete()){
            $message = $name .' is successvol verwijderd.';
            session()->flash('statusbericht', $message);
        }else{
            $message = $name .' is niet verwijderd.';
            session()->flash('statusberichtfail', $message);
        };

        return redirect()->route('admin.partijen');
    }
    public function softdelete($id){
        $candiate = Candidates::find($id);
        $deleted = $candiate->deleted;
        switch ($deleted){
            case true:
                $candiate->softundelete();
                $message = $candiate->name .' is weer beschikbaar';
                session()->flash('statusbericht', $message);
                break;
            default:
                $candiate->softdelete();
                $message = $candiate->name .' is verwijderd';
                session()->flash('statusbericht', $message);
                break;
        }
        return redirect()->back();
    }

}
