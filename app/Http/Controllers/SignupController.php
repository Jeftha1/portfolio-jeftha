<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 

class SignupController extends Controller
{
    public function index(){
        return view('signup'); 
    }

    public function signup(Request $req){
        $valid = $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = new User(); 

        $user->insert([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'password' => Hash::make($req->input('password'))
        ]);

        return redirect('login'); 
    }
}
