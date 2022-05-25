<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PoliController extends Controller
{
    //
    public function index(){
        $data = Poli::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Poli',
            'data' => $data
        ],200);
    }
    public function store(request $request){
        $nama = $request->nama;
        $deskripsi = $request->deskripsi;

        $uploadFolder = 'poli';
        $image = $request->file('image');
        $image_uploaded_path = $image->store($uploadFolder, 'public');

        $saved = Poli::create([
            'kode_poli' => Poli::kodeOtomatis(),
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'image' => 'storage/'. $uploadFolder . '/'  . basename($image_uploaded_path)
        ]);
        if($saved){
            return response([
                'success' => true,
                'message' => 'Data Berhasil Disimpan'
            ], 200);
        }else{
            return response([
               'success' => false,
               'message' => 'Data Gagal Disimpan'
            ],401);
        }
    }
    public function show($id)
    {
        $data = Poli::where('kode_poli',$id);
        if ($data->count() > 0) {
            return response([
                'success' => true,
                'message' => 'Detail Poli',
                'data' => $data->first()
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Poli Tidak Ada',
            ], 401);
        }
    }

    public function update(request $request , $id){
        $poli = Poli::where('kode_poli',$id);

        $nama = $request->nama;
        $deskripsi = $request->deskripsi;

        $saved = $poli->update([
            'nama' => $nama,
            'deskripsi' => $deskripsi
        ]);

        if ($saved) {
            return response([
                'success' => true,
                'message' => 'Data Berhasil Diubah'
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Data Gagal Diubah'
            ], 401);
        }
    }

    public function destroy($id){
        $poli = Poli::where('kode_poli', $id);
        $poli->delete();

        if($poli){
            return response([
               'success' => true,
               'message' => 'Data Berhasil Dihapus'
            ],200);
        }else{
            return response([
                'success' => false,
                'message' => 'Data Gagal Dihapus'
            ],401);
        }
    }
}
