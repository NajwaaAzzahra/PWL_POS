<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\StokModel;
use App\Models\UserModel;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    // Menampilkan halaman awal
    // Pada method index()
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar Stok',
            'list' => ['Home', 'Stok']
        ];

        $page = (object) [
            'title' => 'Daftar stok barang dalam sistem'
        ];

        $activeMenu = 'stok';
        
        // Mengambil data barang untuk filter
        $barang = BarangModel::all(); // Pastikan variabel $barang telah diinisialisasi dengan data barang

        // Meneruskan variabel ke view
        return view('stok.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'barang' => $barang, // Memastikan variabel $barang diteruskan ke view
            'activeMenu' => $activeMenu
        ]);
    }


    // Ambil data dalam bentuk JSON untuk DataTables
    public function list(Request $request)
    {
        $stoks = StokModel::query()->with('barang','user');

        //Filter data  berdasarkan barang_id
        if ($request->barang_id) {
            $stoks->where('barang_id', $request->barang_id);
        }

        return DataTables::of($stoks)
            ->addIndexColumn()
            ->addColumn('aksi', function ($stok) {
                $btn = '<a href="' . url('/stok/' . $stok->stok_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/stok/' . $stok->stok_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/stok/' . $stok->stok_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }


    //menampilkan halaman form tambah 
    public function create() {
        $breadcrumb = (object) [
            'title' => 'Tambah Stok',
            'list' => ['Home', 'Stok', 'Tambah']
        ];
    
        $page = (object) [
            'title' => 'Tambah Stok Baru'
        ];
    
        $barang = BarangModel::all(); // ambil semua data barang
        $user = UserModel::all(); // ambil semua data user
        $activeMenu = 'stok'; 
    
        return view ('stok.create', compact('breadcrumb', 'page', 'barang', 'user', 'activeMenu')); 
    }

    //menyimpan data  baru
    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required|integer',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer',
            'barang_id' => 'required|integer|unique:m_barang,barang_nama' 
        ]);
    
        StokModel::create([
            'user_id' => $request->user_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
            'barang_id' => $request->barang_id
        ]);
    
        return redirect('/stok')->with('success', 'Data stok berhasil disimpan'); 
    }
    //menampilkan detail 
    public function show (string $id) {
        $stok = StokModel::with('barang')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Stok',
            'list' => ['Home', 'Stok', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Stok'
        ];

        $activeMenu = 'stok'; // ubah dari 'barang' menjadi 'stok'

        return view('stok.show', compact('breadcrumb', 'page', 'stok', 'activeMenu')); // ubah dari 'barang.show' menjadi 'stok.show'
    }

    //menampilkan halaman form edit 

    public function edit (string $id) {
        $stok = StokModel::find($id);
        $barang = BarangModel::all();
        $user = UserModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Stok',
            'list' => ['Home', 'Stok', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit stok'
        ];

        $activeMenu = 'stok'; // ubah dari 'barang' menjadi 'stok'

        return view('stok.edit', compact('breadcrumb', 'page', 'barang', 'user', 'stok', 'activeMenu')); 
    }

    //menyimpan perubahan data
    public function update (Request $request, string $id) {
        $request->validate([
            'user_id' => 'required|integer',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer',
            'barang_id' => 'required|integer|unique:m_barang,barang_nama' 
        ]);

        StokModel::find($id)->update([
            'user_id' => $request->user_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
            'barang_id' => $request->barang_id
        ]);
    
        return redirect('/stok')->with('success', 'Data stok berhasil diubah'); // ubah dari '/barang' menjadi '/stok'
    }

    //menghapus data
    public function destroy (string $id) {
        $check = StokModel::find($id);
        if (!$check) { //untuk mengecek apakah data dengan id yang dimaksud ada atau tidak
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan'); // ubah dari '/barang' menjadi '/stok'
        }
        try {
            StokModel::destroy($id); //hapus data level
            return redirect ('/stok')->with('success', 'Data stok berhasil dihapus'); // ubah dari '/barang' menjadi '/stok'
        }catch (\Illuminate\Database\QueryException $e) {
            //jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/stok')->with('error', 'Data stok gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini'); // ubah dari '/barang' menjadi '/stok'
        }
    }
}
