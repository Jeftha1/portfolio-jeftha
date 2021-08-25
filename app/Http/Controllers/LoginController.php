<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login'); 
    }

    public function login(Request $req){
        $validated = $req->validate([
            'email' => 'required',
            'password' => 'required' 
        ]); 

        if (Auth::attempt($validated)){
            $req->session()->regenerate();

            return redirect('logboek'); 
        }

        return back()->withErrors([
            'email' => 'Onjuiste inloggegevens. Probeer opnieuw.'
        ]); 
    }
}
