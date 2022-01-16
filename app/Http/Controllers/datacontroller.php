<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class datacontroller extends Controller
{
    public function index()
    {       $data = DB::table('data')->get();
            return view('data',['data' => $data]);
    }

    public function tambah()
    {
            return view('tambah-data');
    }

    public function simpan(Request $request)
    {

        DB::table('data')->insert([
            ['nama' => $request->nama, 'level' => $request->level, 'email' => $request->email],
            
        ]);
        
            return redirect('data')->with('message','Data Berhasil Di Tambah!');
    }

    public function edit($id)
    {
            $data = DB::table('data')->where('id',$id)->first();

            return view('edit-data',['data' => $data]);

    }

    public function delete($id)
    {
        DB::table('data')->where('id',$id)->delete();
        
             return redirect()->back()->with('message','Data Berhasil Dihapus!');
    }
    
    public function update(Request $request,$id)
    {
        
            $request->validate([

                'avatar' => 'mimes:jpeg,png,jpg,gif,svg'

            ]);
            $imgName = $request->avatar->getClientOriginalName() . '-' . time() . '.' . $request->avatar->extension();
            DB::table('data')->where('id',$id)->update([
            'nama' => $request->nama,
            'level' => $request->level,
            'email' => $request->email,
            'avatar' => $imgName
        ]);
            $request->avatar->move(public_path('images/'), $imgName);
            
            return redirect('data')->with('message','Data Berhasil Di Ubah!');
    }

    public function profile($id)
    {
        $data = \App\data::find($id);
        return view('profile',['data' => $data]);
    }
}
