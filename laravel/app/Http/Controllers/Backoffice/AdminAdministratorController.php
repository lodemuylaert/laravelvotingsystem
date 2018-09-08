<?php

namespace App\Http\Controllers\Backoffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;



class AdminAdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $administrators = Admin::all();

        return view('backoffice.admin.index', compact('administrators'));

    }
    public function create(){

        return view('backoffice.admin.create');
    }
    public function store(Request $request){

        $this->validate($request, array(
            'administratornaam' => 'required|max:30|required',
            'administratoremail' => 'required|email|required',
            'administratorwachtwoord' => 'required',
        ));
        $naam = (string)Request('administratornaam');
        $email = Request('administratoremail');
        $password = Request('administratorwachtwoord');
        $superadmin = Request('superadmin');

        $admin = new Admin();
        $admin->name = $naam;
        $admin->email = $email;
        $admin->password = bcrypt($password);
        $admin->superadmin = $superadmin ? $superadmin: false;
        $admin->softdeleted = false;
        $admin->remember_token = str_random(10);
        if($admin->save()){
            $message = 'U hebt ' . $naam .  ' toegevoegd als administrator.';
            session()->flash('statusbericht', $message);
        }else{
            $message =  $naam .  ' is niet toegevoegd als administrator.';
            session()->flash('statusberichtfail', $message);
        }


        return redirect()->route('admin.administrator');
    }
    public function destroy(Admin $id){
        $admin = $id;
        $deleted = $id->softdeleted;
        switch ($deleted){
            case true:
                $admin->update(['softdeleted' => false]);
                $message = $admin->name .' is weer beschikbaar';
                session()->flash('statusbericht', $message);
                break;
            default:
                $admin->update(['softdeleted' => true]);
                $message = $admin->name .' is verwijderd';
                session()->flash('statusbericht', $message);
                break;
        }
        return redirect()->route('admin.administrator');
    }

}
