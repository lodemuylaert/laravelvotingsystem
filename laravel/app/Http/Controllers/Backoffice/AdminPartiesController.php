<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Candidates;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Parties;
use Image;


class AdminPartiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {



        $partiesadmin = Parties::with('candidates')->get();
        return view('backoffice.parties.index', compact('partiesadmin'));
    }
    public function create()
    {

        return view('backoffice.parties.create');
    }
    public function store(Request $request)
    {

        $this->validate($request, array(
            'partijnaam' => 'required|max:20',
            'partijbeschrijving' => 'required|max:350',
            'afbeelding' => 'required|image|mimes:png'

        ));

        $partiename = $request->partijnaam;
        $description = $request->partijbeschrijving;
        if(!Parties::where('name', $partiename)->exists()){
            $admin = Auth::User();
            //new partie
            $partie = new Parties;
            $partie->name = $partiename;
            $partie->description = $description;
            $partie->deleted = false;
            if($request->hasFile('afbeelding')){
                $file = $request->file('afbeelding');
                $filename = $partiename . '.' .$file->getClientOriginalExtension();
                $location = public_path('images/partijen/' . $filename);
                Image::make($file)->resize(200, 200)->encode('png', 75)->save($location);
                $partie->imgurl = 'images/partijen/' . $filename;
            }
            $partie->save();
            $message = 'U hebt de partij met de naam ' . $partiename .  ' toegevoegd.';
            session()->flash('statusbericht', $message);
        }else{

        }

        return redirect()->route('admin.partijen');

    }
    public function edit($id)
    {
        if($id){
            $partie = Parties::find($id);
        }else{
            return redirect()->route('admin.partijen');
        }


        return view('backoffice.parties.edit', compact('partie'));

    }
    public function update(Request $request, $id)
    {

        $this->validate($request, array(
            'partiename' => 'required|max:20',
            'partiedescription' => 'required',
            'afbeelding' => 'image|mimes:png'

        ));
        if( $request->partiename &&  $request->partiedescription)
        {
            $originalename = Parties::find($id)->name;
            $name = $request->partiename;
            $description = $request->partiedescription;
            $imgurl = $request->afbeelding;

            $update = Parties::find($id);
            $update->update(['name' => $name]);
            $update->update(['description' => $description]);
            if($imgurl){
                $file = $request->file('afbeelding');
                $filename = $name . '.' .$file->getClientOriginalExtension();
                $location = public_path('images/partijen/' . $filename);
                Image::make($file)->resize(200, 200)->save($location);
                $update->update(['imgurl' => 'images/partijen/' . $filename]);
            }


            $message = 'U hebt de partij met de naam ' . $originalename .  ' veranderd naar ' . $name;
            session()->flash('statusbericht', $message);
            return redirect()->route('admin.partijen');

        }else{
            return redirect()->route('admin.partijen');
        }


    }
    public function delete($id)
    {
        if($id){
            $partie = Parties::find($id);
        }else{
            return redirect()->route('admin.partijen');
        }


        return view('backoffice.parties.delete', compact('partie'));


    }
    public function destroy(Request $request, $id)
    {
        $partie = Parties::find($id);
        $name = Parties::find($id)->name;

        if($partie->delete()){

            $message = $name .' is successvol verwijderd inclusief alle candidaten.';
            session()->flash('statusbericht', $message);
        }else{
            $message = $name .' is niet verwijderd.';
            session()->flash('statusberichtfail', $message);
        };

        return redirect()->route('admin.partijen');
    }
    public function softdelete($id){
        $partie = Parties::find($id);
        $candidates = Candidates::where('parties_id', $id);
        $deleted = $partie->deleted;
        switch ($deleted){
            case true:
                    $partie->softundelete();
                    $candidates->update(['deleted' => false]);
                    $message = $partie->name .' is weer beschikbaar';
                    session()->flash('statusbericht', $message);
                break;
            default:
                    $partie->softdelete();
                    $candidates->update(['deleted' => true]);
                    $message = $partie->name .' is verwijderd';
                    session()->flash('statusbericht', $message);
                break;
        }
        return redirect()->back();

    }

}
