<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    //menampilkan halaman awal 
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar Barang',
            'list' => ['Home', 'Barang']
        ];

        $page = (object) [
            'title' => 'Daftar barang yang terdaftar dalam sistem'
        ];

        $activeMenu = 'barang'; //set menu yg sedang aktif

        $kategori=KategoriModel::all(); //ambil data untuk filter kategori

        return view('barang.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori'=>$kategori, 'activeMenu' => $activeMenu]);
    }    

    // Ambil data dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        //$barang = BarangModel::query()->with('kategori');
        $barangs = BarangModel::select('barang_id', 'kategori_id', 'barang_kode', 'barang_nama', 'harga_beli', 'harga_jual' )->with('kategori');


        //Filter data  berdasarkan kategori_id
        if ($request->kategori_id) {
            $barangs->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($barangs)
            ->addIndexColumn()
            ->addColumn('aksi', function ($barang) {
                $btn = '<a href="' . url('/barang/' . $barang->barang_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/barang/' . $barang->barang_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang/' . $barang->barang_id) . '">'
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
            'title' => 'Tambah Barang',
            'list' => ['Home', 'Barang', 'Tambah']
        ];
    
        $page = (object) [
            'title' => 'Tambah barang baru'
        ];
    
        $kategori = KategoriModel::all(); //ambil data kategori untuk ditampilkan di form
        $activeMenu = 'barang'; //set menu yang sedang aktif
    
        return view ('barang.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    //menyimpan data baru
    public function store(Request $request) {
        $request->validate([
            'kategori_id' => 'required|integer',
            'barang_kode' => 'required|string', // harus diisi berupa string dan maksimal 10karakter
            'barang_nama' => 'required|min:1', //harus diisi dan minimal 5 karakter
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer'
        ]);
    
        BarangModel::create([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode, 
            'barang_nama' => $request->barang_nama, 
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual
        ]);
    
        return redirect('/barang')->with('success', 'Data barang berhasil disimpan'); 
    }
    //menampilkan detail 
    public function show (string $id) {
        $barang = BarangModel::with('kategori')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Barang',
            'list' => ['Home', 'Barang', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Barang'
        ];

        $activeMenu = 'barang'; //set menu yang sedang aktif

        return view('barang.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'activeMenu' => $activeMenu]);
    }

    //menampilkan halaman form edit 

    public function edit (string $id) {
        $barang = BarangModel::find($id);
        $kategori = KategoriModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Barang',
            'list' => ['Home', 'Barang', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit barang'
        ];

        $activeMenu = 'barang';

        return view('barang.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    //menyimpan perubahan data 
    public function update (Request $request, string $id) {

        $request->validate([
            'kategori_id' => 'required|integer',
            'barang_kode' => 'required|string|max:10', // harus diisi berupa string dan maksimal 10karakter
            'barang_nama' => 'required|min:1', //harus diisi dan minimal 5 karakter
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer'
        ]);

        BarangModel::find($id)->update([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode, 
            'barang_nama' => $request->barang_nama, 
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ]);
    
        return redirect('/barang')->with('success', 'Data barang berhasil diubah'); 
    }

    //menghapus data 
    public function destroy (string $id) {
        $check = BarangModel::find($id);
        if (!$check) { //untuk mengecek apakah data  dengan id yang dimaksud ada atau tidak
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }
        try {
            BarangModel::destroy($id); //hapus data 
            return redirect ('/barang')->with('success', 'Data barang berhasil dihapus');
        }catch (\Illuminate\Database\QueryException $e) {
            //jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/barang')->with('error', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
