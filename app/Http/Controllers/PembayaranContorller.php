<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranContorller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pembayaran::select('pembayaran.id AS id','pendaftaran.id AS id_pendaftaran','pasien.nama AS pasien','pembayaran.status AS status')
        ->join('pendaftaran','pendaftaran.id','=','pembayaran.pendaftaran_id')
        ->join('pasien','pasien.id','=','pendaftaran.pasien_id')
        ->get();

        
        return view('pembayaran.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenis_biaya = Pembayaran::select('pembayaran.id','jenis_biaya.nama AS jenis_biaya','jenis_biaya.tarif AS tarif')
        ->join('pendaftaran','pendaftaran.id','=','pembayaran.pendaftaran_id')
        ->join('detail_jenis_biaya','detail_jenis_biaya.pendaftaran_id','=','pendaftaran.id')
        ->join('jenis_biaya','jenis_biaya.id','=','detail_jenis_biaya.jenis_biaya_id')
        ->where('pembayaran.id',$id)
        ->get();

        $harga_obat = Pembayaran::select('pembayaran.id','obat.nama AS obat','obat.harga_jual AS harga','resep.jumlah AS jumlah')
        ->join('pendaftaran','pendaftaran.id','=','pembayaran.pendaftaran_id')
        ->join('pemeriksaan','pemeriksaan.pendaftaran_id','=','pendaftaran.id')
        ->join('resep','resep.pemeriksaan_id','=','pemeriksaan.id')
        ->join('obat','obat.id','=','resep.obat_id')
        ->where('pembayaran.id',$id)
        ->get();

        $total = 0;
        
        foreach($harga_obat as $hb){
            $total = $total + $hb->harga * $hb->jumlah;
        }
        $total_jenis = 0;
        foreach($jenis_biaya as $jb){
            $total_jenis = $total_jenis + $jb->tarif;
        }
        $hasil = $total_jenis + $total;

        return view('pembayaran.bayar',compact('hasil','harga_obat','jenis_biaya','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
            $pembayaran = Pembayaran::findOrFail($id);
            $pembayaran->update([
                'status' => 'Lunas'
            ]);
        return redirect('admin/pembayaran')->with('message','Sudah Lunas!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
