<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']); // if the user is not guest (Already signed in), can't access login page.
    }
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request){
        //dd($request->remember); // return on
           $this->validate($request, [
               'email'=> 'required|email',
               'password'=>'required'
           ]);
         
           // Sign in the user
          if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
              return back() ->with('status', 'Invalid Credientials');
          }

           //redirect the user to dashboard page
           return redirect()->route('dashboard');
    }
}
