<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\RiwayatPemeriksaan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RiwayatPemeriksaanController extends Controller
{
    public function index(){
        // $datas = array();
        $riwayat = RiwayatPemeriksaan::get();
            # code...
            $data = DB::table('pemeriksaan')
                    ->select('dokter.nama AS nama','poli.nama AS poli','pendaftaran.tgl_pendaftaran')
                    ->join('pendaftaran','pendaftaran.id','=','pemeriksaan.pendaftaran_id')
                    ->join('jadwal_dokter','jadwal_dokter.id','=','pendaftaran.jadwal_dokter_id')
                    ->join('dokter','dokter.id','=','jadwal_dokter.dokter_id')
                    ->join('poli','poli.kode_poli','=','dokter.poli_id')
                    ->get();
        return response([
            'success' => true,
            'message' => 'List Riwayat',
            'data' => $data
        ], 200);
    }

    public function show($id){
        $data = DB::table('pemeriksaan')
                ->select('pemeriksaan.id AS id','dokter.nama AS nama','poli.nama AS poli','pendaftaran.tgl_pendaftaran')
                ->join('pendaftaran','pendaftaran.id','=','pemeriksaan.pendaftaran_id')
                ->join('jadwal_dokter','jadwal_dokter.id','=','pendaftaran.jadwal_dokter_id')
                ->join('dokter','dokter.id','=','jadwal_dokter.dokter_id')
                ->join('poli','poli.kode_poli','=','dokter.poli_id')
                ->where('pendaftaran.pasien_id',$id)
                ->get();
    return response([
        'success' => true,
        'message' => 'List Riwayat',
        'data' => $data
    ], 200);
    }

    public function details($id){
        $detail = DB::table('pemeriksaan')
        ->select('pemeriksaan.id AS id','pemeriksaan.keluhan AS keluhan','pemeriksaan.diagnosa AS diagnosa','pemeriksaan.perawatan AS perawatan','pemeriksaan.tindakan AS tindakan','pemeriksaan.berat_badan AS bb','pemeriksaan.tensi_darah AS tensi','dokter.nama AS nama','poli.nama AS poli','pendaftaran.tgl_pendaftaran')
        ->join('pendaftaran','pendaftaran.id','=','pemeriksaan.pendaftaran_id')
        ->join('jadwal_dokter','jadwal_dokter.id','=','pendaftaran.jadwal_dokter_id')
        ->join('dokter','dokter.id','=','jadwal_dokter.dokter_id')
        ->join('poli','poli.kode_poli','=','dokter.poli_id')
        ->where('pemeriksaan.id',$id)
        ->get();
        return response([
            'success' => true,
            'message' => 'List Riwayat',
            'data' => $detail
        ], 200);
    }
}
