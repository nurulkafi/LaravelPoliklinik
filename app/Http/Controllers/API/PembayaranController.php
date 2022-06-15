<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailJenisBiaya;
use App\Models\MediaPembayaran;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\Resep;


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
    public function detail_obat($id){
        $data = Resep::join('pemeriksaan','pemeriksaan.id','=','resep.pemeriksaan_id')
        ->select('obat.nama','obat.harga_jual')
        ->join('pendaftaran','pendaftaran.id','=','pemeriksaan.pendaftaran_id')
        ->join('obat','obat.id','=','resep.obat_id')
        ->where('pendaftaran.id','=',$id)
        ->get();
        if ($data->count()>0) {
            return response([
                'success' => true,
                'message' => 'List Obat',
                'data' => $data
            ], 200);
        }else{
            return response([
                'success' => false,
                'message' => 'Tidak Ditemu',
            ], 200);
        }
    }
    public function detail_biaya($id)
    {
        $data = DetailJenisBiaya::where('pendaftaran_id', $id)
            ->join('jenis_biaya', 'jenis_biaya.id', '=', 'detail_jenis_biaya.jenis_biaya_id')
            ->get();
        if ($data->count() > 0) {
            return response([
                'success' => true,
                'message' => 'List Biaya',
                'data' => $data
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Tidak Ditemukan',
            ], 200);
        }
    }
    public function media_pembayaran(){
        $data = MediaPembayaran::get();
        if ($data->count() > 0) {
            return response([
                'success' => true,
                'message' => 'List Media Pembayaran',
                'data' => $data
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Tidak Ditemukan',
            ], 200);
        }
    }
    public function update(Request $request){
        $image = $request->file('image');
        $nama_photo = rand() . $image->getClientOriginalName();
        $image->move('images/bukti_pembayaran', $nama_photo);
        $photo = 'images/bukti_pembayaran/' . $nama_photo;
        $data = Pembayaran::where('pendaftaran_id',$request->id)->first();
        $data->update([
            'status' => "Menunggu Verifikasi Pembayaran",
            'bukti_pembayaran' => $photo,
            'metode_pembayaran' => "Transfer Via Bank"
        ]);
        return response([
            'success' => true,
            'message' => 'Upload Selesai!',
        ], 200);
    }
}
