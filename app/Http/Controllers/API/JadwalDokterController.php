<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    //
    public function index(){
        $data = JadwalDokter::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Jadwal Dokter',
            'data' => $data
        ],200);
    }
    public function show($id){
        $data = JadwalDokter::whereId($id);
        if($data->count() > 0){
            return response([
                'success' =>true,
                'message' => 'detail jadwal',
                'data' => $data->first()
            ],200);
        }else{
            return response([
                'success' => false,
                'message' => 'errors'
            ],401);
        }
    }
    public function store(request $request){
        $dokter_id = $request->dokter_id;
        $hari = $request->hari;
        $jam_mulai = $request->jam_mulai;
        $jam_selesai = $request->jam_selesai;

        $saved = JadwalDokter::create([
            'dokter_id' => $dokter_id,
            'hari' => $hari,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai
        ]);

        if($saved){
            return response([
                'success' => true,
                'message' => 'Data berhasil disimpan!',
            ],200);
        }else{
            return response([
                'success' => false,
                'message' => 'Data gagal disimpan!'
            ],401);
        }
    }
    public function update(request $request,$id){
        $jadwal = JadwalDokter::whereId($id);
        //
        $dokter_id = $request->dokter_id;
        $hari = $request->hari;
        $jam_mulai = $request->jam_mulai;
        $jam_selesai = $request->jam_selesai;

        $saved = $jadwal->update([
            'dokter_id' => $dokter_id,
            'hari' => $hari,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai
        ]);

        if ($saved) {
            return response([
                'success' => true,
                'message' => 'Data berhasil diubah!',
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Data gagal diubah!'
            ], 401);
        }
    }
    public function destroy($id){
        $jadwal = JadwalDokter::whereId($id);
        $jadwal->delete();
        if($jadwal){
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
