<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index() {
        $users = UserModel::with('level')->get();
        return view('user', ['data' => $users]);
    }    

    public function tambah() {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request): RedirectResponse {
        //validasi
        $validated = $request->validate([
            'username' => 'required|unique:m_user|max:255',
            'nama' => 'required',
            'password' => 'required',
            'level_id' => 'required',
        ]);
    
        //store
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ]);
    
        return redirect('/user');
    }

    public function ubah($id){
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request) {
        $user = UserModel::find($id);
        
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password); // Perubahan di sini
        $user->level_id = $request->level_id;
        
        $user->save();

        return redirect('/user');
    }

    public function hapus($id){
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
}
