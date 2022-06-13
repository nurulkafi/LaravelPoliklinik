<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailJenisBiaya;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\Pemeriksaan;

class PembayaranController extends Controller
{
    //
    public function show($id){
        $data = Pembayaran::join('pendaftaran', 'pendaftaran.id', '=', 'pembayaran.pendaftaran_id')
        ->select('pembayaran.id AS pembayaran', 'pendaftaran.id AS id', 'pendaftaran.tgl_pendaftaran AS tanggal', 'pembayaran.status AS status',)
        ->where('pendaftaran.pasien_id', $id)
        ->get();
        $datas = [];
        foreach ($data as $value) {
            $resep = Pemeriksaan::where('pendaftaran_id', $value->id)
                    ->join('resep','resep.pemeriksaan_id','=','pemeriksaan.id')
                    ->join('obat','obat.id','=','resep.obat_id')
                    ->sum('harga_jual');
            $jenis_biaya =
            DetailJenisBiaya::where('pendaftaran_id', $value->id)
                ->join('jenis_biaya', 'jenis_biaya.id', '=', 'detail_jenis_biaya.jenis_biaya_id')
                ->sum('tarif');
            $datas [] = [
                'id_pendaftran' => $value->id,
                'tanggal_pendaftaran' => $value->tanggal,
                'total_pembayaran' =>  number_format($resep+$jenis_biaya, 0, '', '.'),
                'status' => $value->status
            ];
        }
        return response([
            'success' => true,
            'message' => 'List Pasien',
            'data' => $datas
        ], 200);
    }
}
