<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    //menampilkan halaman awal user
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user'; //set menu yg sedang aktif

        $level=LevelModel::all(); //ambil data untuk filter level

        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level'=>$level, 'activeMenu' => $activeMenu]);
    }    

    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');

        //Filter data user berdasarkan level_id
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }


    //menampilkan halaman form tambah user
    public function create() {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];
    
        $page = (object) [
            'title' => 'Tambah User Baru'
        ];
    
        $level = LevelModel::all(); //ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; //set menu yang sedang aktif
    
        return view ('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    //menyimpan data user baru
    public function store(Request $request) {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',  //username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
            'nama' => 'required|string|max:100', //nama harus diisi berupa string dan maksimal 100 karakter
            'password' => 'required|min:5', //password harus diisi dan minimal 5 karakter
            'level_id' => 'required|integer', //level_id harus diisi berupa angka
            'image' => 'required' 
        ]);

                 // Get file extension
                $extFile = $request->image->extension();
                $nama = $request->kode . " - " . $request->nama . ".$extFile";
                // Pindahkan gambar ke folder
                $path = $request->image->move('gambar', $nama);
                $path = str_replace("\\", "//", $path);
                $pathBaru = asset('gambar/' . $nama);
    
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password), //password dienkripsi sebelum disimpan
            'level_id' => $request->level_id,
            'image' => $pathBaru
        ]);
    
        return redirect('/user')->with('success', 'Data user berhasil disimpan'); 
    }
    //menampilkan detail user
    public function show (string $id) {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail User'
        ];

        $activeMenu = 'user'; //set menu yang sedang aktif

        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    //menampilkan halaman form edit user

    public function edit (string $id) {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit user'
        ];

        $activeMenu = 'user';

        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    //menyimpan perubahan data user
    public function update (Request $request, string $id) {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer',
            'image' => 'required'
        ]);

                 // Get file extension
                 $extFile = $request->image->extension();
                 $nama = $request->kode . " - " . $request->nama . ".$extFile";
                 // Pindahkan gambar ke folder
                 $path = $request->image->move('gambar', $nama);
                 $path = str_replace("\\", "//", $path);
                 $pathBaru = asset('gambar/' . $nama);

        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password, //password dienkripsi sebelum disimpan
            'level_id' => $request->level_id,
            'image' => $pathBaru
        ]);
    
        return redirect('/user')->with('success', 'Data user berhasil diubah'); 
    }

    //menghapus data user
    public function destroy (string $id) {
        $check = UserModel::find($id);
        if (!$check) { //untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }
        try {
            UserModel::destroy($id); //hapus data level
            return redirect ('/user')->with('success', 'Data user berhasil dihapus');
        }catch (\Illuminate\Database\QueryException $e) {
            //jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
    /*
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
    */
}
