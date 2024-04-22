<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index () {
        // kita ambil data user lalu simpan pada variabel user
        $user = Auth::user();

        //kondisi jika ada user nya
        if ($user) {
            //jika user level = admin
            if ($user->level_id == '1') {
                return redirect()->intended('admin');
            }
            //jika user level = manager
            if ($user->level_id == '2') {
                return redirect()->intended('manager');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request) {
        //kita buat va;idasi pada saat tombol login di klik
        //validasi nya username & password wajib diisi
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //ambil data request username & password saja 
        $credential = $request->only('username', 'password');
        //cek jika data username dan password sesuai data (valid)
        if (Auth::attempt($credential)) {
            //kalau berhasil simpan data user ya di variabel user
            $user = Auth::user();

            //cek lagi jika level user admin maka arahkan ke halaman admin
            if ($user->level_id == '1') {
                return redirect()->intended('admin');
            }
            //tapi jika level user nya user biasa maka arahkan ke halaman user
            else if ($user->level_id == '2') {
                return redirect()->intended('manager');
            }
            //jika belum ada role maka ke halaman /
            return redirect()->intended('/');
        }
        // jika tdk ada data user yang valid maka kembalikan ke halam login
        //pastikan kirim pesan errror juga kalau gagal login ya
        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagagl' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
    }

    public function register() {
        //tampilkan view register 
        return view('register');
    }

    //aksi form register
    public function proses_register(Request $request) {
        //kita butuh validasi untuk proses register
        //validasinya yaitu semua field wajib diisi
        //validasi username harus unique (tidak boleh duplicate username)
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:m_user',
            'password' => 'required'
        ]);

        //kalau gagal kembali ke  halaman register  dengan memunculkan pesan error
        if ($validator->fails()) {
            return redirect('/register')
            ->withErrors($validator)
            ->withInput();
        }

        //kalau berhasil isi level, hash passwordnya biar secure
        $request['level_id'] = '2';
        $request['password'] = Hash::make($request->password);
        
        //masukkan semua data pada request ke tabel user
        UserModel::create($request->all());

        //jika berhasil arahkan ke halam login
        return redirect()->route('login');
    }

    public function logout(Request $request) {
        //logout itu harus hapus session
        $request->session()->flush();

        //jalankan juga fungsi logout pada auth
        Auth::logout();
        //kembali ke halaman login
        return redirect('login');
    }
    
}