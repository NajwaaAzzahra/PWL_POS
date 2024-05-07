<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PenjualanModel;

class PenjualanController extends Controller
{
    //jobsheet 11
    public  function __invoke(Request $request) {
        //set validation
        $validator = Validator::make($request->all(), [
            'user_id'=>'required|integer',
            'pembeli' => 'required|string', 
            'penjualan_kode' => 'required|string', 
            'penjualan_tanggal' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //if validation fails
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //get the image file
        $image = $request->file('image');


        //create user
        $user = PenjualanModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli, 
            'penjualan_kode' => $request->penjualan_kode, 
            'penjualan_tanggal' => $request->penjualan_tanggal,
            'image' => $image->hashName(),
        ]);

        //return response JSON user is created
        if($user){
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }

        //return JSON process insert failed
        return response()->json([
            'success' => false,
        ], 409);
    }
}