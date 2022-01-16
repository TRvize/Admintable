<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class authcontroller extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = User::where('email',$request->email)->first();
        if ($data){
            if(Hash::check($request->password,$data->password)){  
                return redirect('/data');
            
            }
        }
        return redirect('/')->with('message','Email Atau Password Salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
