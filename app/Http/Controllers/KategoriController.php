<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        /* $data = [
             'kategori_kode' => 'SNK',
             'kategori_nama' => 'Snack/Makanan Ringan',
             'created_at' => now()
        ];
         DB::table('m_kategori')->insert($data);
        return 'Insert data baru berhasil';

        $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
        return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

        $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);*/

        return $dataTable->render('kategori.index'); 
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request): RedirectResponse
{
    // Aturan validasi untuk data yang dikirimkan
    $validated = $request->validate([
        'kategori_kode' => 'required|unique:m_kategori|max:255',
        'kategori_nama' => 'required',
    ]);

    // Store the post
    KategoriModel::create($validated);

    return redirect('/kategori')->with('success', 'Data kategori berhasil ditambahkan.');
}

    /*public function store(Request $request) {
        $validated = $request->validateWithBag('post', [
            'kategori_kode' => ['required', 'unique:posts', 'max:255'],
            'kategori_nama' => ['required'],
        ]);
        return redirect('/kategori');
    }*/

    /*public function store(Request $request)
    {
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }*/

    public function edit($id)
    {
    $kategori = KategoriModel::find($id);
    return view('kategori.edit', ['data' => $kategori]);
    }

    public function edit_simpan($id, Request $request)
    {
    $kategori = KategoriModel::find($id);
    $kategori->kategori_kode = $request->kodeKategori;
    $kategori->kategori_nama = $request->namaKategori;
    $kategori->save();
    return redirect('/kategori');
    }

    public function delete($id)
    {
    $kategori = KategoriModel::find($id);
    $kategori->delete();
    return redirect('/kategori');
    }

}