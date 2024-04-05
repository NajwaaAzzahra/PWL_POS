<?php

namespace App\Http\Controllers;

use App\DataTables\LevelDataTable;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Monolog\Level;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    //menampilkan halaman awal user
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar level  yang terdaftar dalam sistem'
        ];

        $activeMenu = 'level'; //set menu yg sedang aktif

        $level=LevelModel::all(); //ambil data untuk filter level

        return view('level.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level'=>$level, 'activeMenu' => $activeMenu]);
    }    

    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        //$levels = LevelModel::select('level_id', 'level_kode', 'level_nama')
        //    ->with('level');

        $levels = LevelModel::query();

        //Filter data user berdasarkan level_id
        if ($request->level_id) {
            $levels->where('level_id', $request->level_id);
        }

        return DataTables::of($levels)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) {
                $btn = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">'
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
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];
    
        $page = (object) [
            'title' => 'Tambah level Baru'
        ];
    
        $level = LevelModel::all(); //ambil data level untuk ditampilkan di form
        $activeMenu = 'level'; //set menu yang sedang aktif
    
        return view ('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    //menyimpan data user baru
    public function store(Request $request) {
        $request->validate([
            'level_kode' => 'required|string|max:10', //nama harus diisi berupa string dan maksimal 10karakter
            'level_nama' => 'required|min:1', //password harus diisi dan minimal 5 karakter
        ]);
    
        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);
    
        return redirect('/level')->with('success', 'Data level berhasil disimpan'); 
    }
    //menampilkan detail user
    public function show (string $id) {
        $level = LevelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Level',
            'list' => ['Home', 'Level', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Level'
        ];

        $activeMenu = 'level'; //set menu yang sedang aktif

        return view('level.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    //menampilkan halaman form edit user

    public function edit (string $id) {
       // $user = LevelModel::find($id);
        $level = LevelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Level',
            'list' => ['Home', 'Level', 'Edit']
        ];

        $page = (object) [
            'title' => 'Level user'
        ];

        $activeMenu = 'level';

        return view('level.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level,  'activeMenu' => $activeMenu]);
    }

    //menyimpan perubahan data user
    public function update (Request $request, string $id) {

        $request->validate([
            'level_kode' => 'required|string|max:10', //nama harus diisi berupa string dan maksimal 10karakter
            'level_nama' => 'required|min:1', //password harus diisi dan minimal 5 karakter
        ]);

        LevelModel::find($id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);
    
        return redirect('/level')->with('success', 'Data level berhasil diubah'); 
    }

    //menghapus data user
    public function destroy (string $id) {
        $check = LevelModel::find($id);
        if (!$check) { //untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }
        try {
            LevelModel::destroy($id); //hapus data level
            return redirect ('/level')->with('success', 'Data level berhasil dihapus');
        }catch (\Illuminate\Database\QueryException $e) {
            //jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
    
    /*
    public function index(LevelDataTable $dataTable) {
        /*DB::insert('insert into m_level(level_kode, level_nama, created_at) 
        values (?, ?, ?)', ['CUS', 'Pelanggan', now()]);

        return 'Insert data baru berhasil';
        */

        /*$row=DB::update('update m_level set level_nama = ? where level_kode = ? ', ['Customer', 'cus']);
        return 'Update data berhasil. Jumlah data yang diupdate ' . $row .' baris';
        */

        /*$row=DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        return 'Delete data berhasil. Jumlah data yang dihapus ' . $row .' baris';*/

        /*$data=DB::select('select * from m_level');
        return view('level', ['data'=> $data]);
        return $dataTable->render('level.index');
        
    }
    public function tambah() {
        return view('level_tambah');
    }

    public function tambah_simpan(Request $request): RedirectResponse {
        //validasi
        $validated = $request->validate([
            'level_id' => 'required|unique:m_level|max:255',
            'level_nama' => 'required',
            'level_kode' => 'required',
        ]);

        //store
        LevelModel::create ($validated);
        return redirect('/level');
    }
    */
}
