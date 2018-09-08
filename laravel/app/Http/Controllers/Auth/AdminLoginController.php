<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.AdminLogin');
    }
    public function login(Request $request)
    {
        //validate logindata
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ]);
        //attempt to login user
        if(Auth::guard('admin')->attempt(['name' =>  $request->name, 'password' =>  $request->password], $request->remember)){
            //success login
            return redirect()->route('admin.home');
        }
        //not success login
//        return redirect()->back()->withinput($request->only('name', 'remember'));
//        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
    public function username()
    {
        return 'email';
    }
}
