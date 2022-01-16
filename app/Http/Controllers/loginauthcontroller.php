<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class loginauthcontroller extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        //dd($request->all());
        $data = User::where('email',$request->email)->firstOrFail();
        if ($data){
            if(Hash::check($request->password,$data->password)){  
                return redirect('/');
            
            }
        }
    }
}