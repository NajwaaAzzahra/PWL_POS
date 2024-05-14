<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload(){
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request) {
        // dump($request->berkas);
        // return "Pemrosesan file upload di sini";
        // if ($request->hasFile('berkas')) {
        //     echo "path(): ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): " . $request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): " . $request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getClientOriginalName(): ". $request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): " . $request->berkas->getSize();
        // }
        // else {
        //     echo "Tidak ada berkas yang diupload";
        // }
        $request->validate([
            'berkas'=>'required|file|image|max:500',
            'nama_file'=>'required|string|min:3']);
            //$extFile=$request->berkas->getClientOriginalName();
            $namaFile = $request->input('nama_file') . "." . $request->berkas->getClientOriginalExtension();

            // $path = $request->berkas->storeAs('public', $namaFile, 'local');
            $path = $request->berkas->move('gambar', $namaFile);
            $path = str_replace("\\","//", $path);
            echo "Variabel path berisi: $path <br>";

            $pathBaru=asset('gambar/'.$namaFile);
            echo "Proses upload berhasil, file berada di: " . $path;
            echo "<br>";
            echo "Tampilan link:<a href='$pathBaru'>$pathBaru</a>";
            // echo $request->berkas->getClientOriginalName()."lolos validasi";
    }
}
