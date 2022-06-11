<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    //
    public function show($id){
        $data = Pembayaran::join('pendaftaran','pendaftaran.id','=','pembayaran.pendaftaran_id')
                ->select('pembayaran.id AS pembayaran','pendaftaran.id AS id','pendaftaran.tgl_pendaftaran AS tanggal','pembayaran.status AS status',)
                ->join('pemeriksaan','pemeriksaan.pendaftaran_id','=','pendaftaran.id')
                ->join('resep','resep.pemeriksaan_id','=','pemeriksaan.id')
                ->join('obat','obat.id','=','resep.obat_id')
                ->where('pendaftaran.pasien_id',$id)
                ->get();
        return response([
            'success' => true,
            'message' => 'List Pasien',
            'data' => $data
        ], 200);
    }
}
