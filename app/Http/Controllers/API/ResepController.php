<?php

namespace App\Http\Controllers\API;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ResepController extends Controller
{
    //
    public function index(){
        $data = Resep::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Resep',
            'data' => $data
        ], 200);
    }

    public function detail($id){
        $detail = DB::table('resep')
        ->select('resep.id AS id','resep.dosis AS dosis','resep.jumlah AS jumlah','poli.nama AS poli','dokter.nama AS nama','pendaftaran.tgl_pendaftaran')
        ->join('pemeriksaan','pemeriksaan.id','=','resep.pemeriksaan_id')
        ->join('pendaftaran','pendaftaran.id','=','pemeriksaan.pendaftaran_id')
        ->join('jadwal_dokter','jadwal_dokter.id','=','pendaftaran.jadwal_dokter_id')
        ->join('dokter','dokter.id','=','jadwal_dokter.dokter_id')
        ->join('poli','poli.kode_poli','=','dokter.poli_id')
        ->where('resep.pemeriksaan_id',$id)
        ->get();
        return response([
            'success' => true,
            'message' => 'List Riwayat',
            'data' => $detail
        ], 200);
    }
}
