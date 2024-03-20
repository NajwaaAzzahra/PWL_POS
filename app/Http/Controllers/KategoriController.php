<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\DataTables\KategoriDataTable;
use Illuminate\View\View;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        // Render the DataTables view and return it
        return $dataTable->render('kategori.index');

    }

    public function create(){
        return view('kategori.create');
    }
    public function store(Request $request) {
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }

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
        KategoriModel::where('kategori_id', $id)->delete();
        return redirect('/kategori');
    }
}
