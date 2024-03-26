<?php

namespace App\Http\Controllers;

use App\DataTables\LevelDataTable;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Monolog\Level;

class LevelController extends Controller
{
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
        return view('level', ['data'=> $data]);*/
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
}
