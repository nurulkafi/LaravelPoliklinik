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
        $data = DB::table('resep')
        ->select('resep.id AS id','dokter.nama AS nama','poli.nama AS poli','pendaftaran.tgl_pendaftaran')
        ->join('pemeriksaan','pemeriksaan.id','=','resep.pemeriksaan_id')
        ->join('pendaftaran','pendaftaran.id','=','pemeriksaan.pendaftaran_id')
        ->join('jadwal_dokter','jadwal_dokter.id','=','pendaftaran.jadwal_dokter_id')
        ->join('dokter','dokter.id','=','jadwal_dokter.dokter_id')
        ->join('poli','poli.kode_poli','=','dokter.poli_id');
        return response([
            'success' => true,
            'message' => 'List Resep',
            'data' => $data
        ], 200);
    }


    public function show($id){
        $data = DB::table('resep')
        ->select('resep.id AS id','dokter.nama AS nama','poli.nama AS poli','pendaftaran.tgl_pendaftaran')
        ->join('pemeriksaan','pemeriksaan.id','=','resep.pemeriksaan_id')
        ->join('pendaftaran','pendaftaran.id','=','pemeriksaan.pendaftaran_id')
        ->join('jadwal_dokter','jadwal_dokter.id','=','pendaftaran.jadwal_dokter_id')
        ->join('dokter','dokter.id','=','jadwal_dokter.dokter_id')
        ->join('poli','poli.kode_poli','=','dokter.poli_id')
        ->where('pendaftaran.pasien_id',$id)
        ->get();
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

    public function details($id){
        $details = DB::table('resep')
        ->select('resep.id AS id','resep.dosis AS dosis','resep.jumlah AS jumlah','poli.nama AS poli','dokter.nama AS nama','pendaftaran.tgl_pendaftaran','obat.nama AS obat')
        ->join('pemeriksaan','pemeriksaan.id','=','resep.pemeriksaan_id')
        ->join('pendaftaran','pendaftaran.id','=','pemeriksaan.pendaftaran_id')
        ->join('jadwal_dokter','jadwal_dokter.id','=','pendaftaran.jadwal_dokter_id')
        ->join('dokter','dokter.id','=','jadwal_dokter.dokter_id')
        ->join('poli','poli.kode_poli','=','dokter.poli_id')
        ->join('obat','obat.id','=','resep.obat_id')
        ->where('resep.obat_id',$id)
        ->get();
        return response([
            'success' => true,
            'message' => 'List Riwayat',
            'data' => $details
        ], 200);
    }
}
