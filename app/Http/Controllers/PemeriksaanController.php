<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use App\Models\Pendaftaran;
use Auth;
use DateTime;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pendaftaran::select('pendaftaran.id AS id', 'dokter.nama AS dokter', 'pasien.nama AS pasien', 'poli.nama AS poli', 'no_antrian', 'tgl_pendaftaran', 'status')
            ->join('jadwal_dokter', 'jadwal_dokter.id', '=', 'pendaftaran.jadwal_dokter_id')
            ->join('dokter', 'dokter.id', '=', 'jadwal_dokter.dokter_id')
            ->join('poli', 'poli.kode_poli', '=', 'dokter.poli_id')
            ->join('pasien', 'pasien.id', '=', 'pendaftaran.pasien_id')
            ->orderBy('tgl_pendaftaran', 'DESC')
            ->where('dokter.user_id',Auth::id())
            ->get();

        return view('pemeriksaan.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    function hitung_umur($id){
        $tanggal_lahir = Pendaftaran::select('pasien.tgl_lahir')
            ->join('pasien', 'pasien.id', '=', 'pendaftaran.pasien_id')
            ->where('pendaftaran.id', $id)
            ->first();
        $birthDate = new DateTime($tanggal_lahir->tgl_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) {
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        return $y;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $umur = $this->hitung_umur($id);
        $data = Pendaftaran::select('pasien.nama AS pasien')
            ->join('pasien', 'pasien.id', '=', 'pendaftaran.pasien_id')
            ->where('pendaftaran.id', $id)
            ->first();
        return view('pemeriksaan.periksa',compact('umur','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
