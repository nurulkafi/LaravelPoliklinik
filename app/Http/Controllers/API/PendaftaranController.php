<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JadwalDokter;
use App\Models\Pendaftaran;
use App\Models\Poli;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pendaftaran::get();
        return response([
            'success' => true,
            'message' => 'List Pendaftaran',
            'data' => $data
        ],200);
    }


    public function antri()
    {
        $poli = Poli::get();
        $datas = [];
        
        foreach($poli AS $p){
        $data = Pendaftaran::select('pendaftaran.id AS id','jadwal_dokter.jam_mulai AS jam_mulai','jadwal_dokter.jam_selesai AS jam_selesai','dokter.nama AS dokter','pendaftaran.no_antrian AS no_antrian','poli.kode_poli AS kode_poli','poli.nama AS nama_poli','dokter.poli_id','pendaftaran.tgl_pendaftaran AS tgl_pendaftaran','jadwal_dokter.hari AS hari','pendaftaran.status AS status')
        ->join('jadwal_dokter','jadwal_dokter.id','=','pendaftaran.jadwal_dokter_id')
        ->join('dokter','dokter.id','=','jadwal_dokter.dokter_id')
        ->join('poli','poli.kode_poli','=','dokter.poli_id')
        ->where('pendaftaran.status','Terdaftar')
        ->where('dokter.poli_id',$p->kode_poli)
        ->where('pendaftaran.tgl_pendaftaran',date('Y-m-d'))
        ->first();
        if($data != NULL){
        $datas[] = $data;
        }
        }
        return response([
            'success' => true,
            'message' => 'List Pendaftaran',
            'data' => $datas
        ],200);
    }

    public function daftar($id)
    {
        $data = Pendaftaran::select('pendaftaran.id AS id','jadwal_dokter.jam_mulai AS jam_mulai','jadwal_dokter.jam_selesai AS jam_selesai','dokter.nama AS dokter','pendaftaran.no_antrian AS no_antrian','poli.kode_poli AS kode_poli','poli.nama AS nama_poli','dokter.poli_id','pendaftaran.tgl_pendaftaran AS tgl_pendaftaran','jadwal_dokter.hari AS hari','pendaftaran.status AS status')
        ->join('jadwal_dokter','jadwal_dokter.id','=','pendaftaran.jadwal_dokter_id')
        ->join('dokter','dokter.id','=','jadwal_dokter.dokter_id')
        ->join('poli','poli.kode_poli','=','dokter.poli_id')
        ->where('pendaftaran.pasien_id',$id)
        ->get();
        return response([
            'success' => true,
            'message' => 'List Pendaftaran',
            'data' => $data
        ],200);
    }



    public function daftar_baru()
    {
        $mytime = Carbon::now('Asia/Jakarta');
        $data = JadwalDokter::select('jadwal_dokter.id','jadwal_dokter.jam_mulai AS jam_mulai','jadwal_dokter.jam_selesai AS jam_selesai','dokter.nama AS dokter','poli.kode_poli AS kode_poli','poli.nama AS nama_poli','dokter.poli_id','jadwal_dokter.hari AS hari')
        ->join('dokter','dokter.id','=','jadwal_dokter.dokter_id')
        ->join('poli','poli.kode_poli','=','dokter.poli_id')
        ->where('jadwal_dokter.hari',$mytime->isoFormat('dddd'))
        ->where('jam_selesai',">", $mytime->isoFormat('H:m:s'))
        ->get();
        return response([
            'success' => true,
            'message' => 'List Hadir',
            'data' => $data
        ],200);
    }

    public function pendaftaran(Request $request){
        $id_jadwal = $request->jadwal_dokter;
        $no_antrian = Pendaftaran::generateNoAntrian($id_jadwal,date('Y-m-d'));
        $no_pasien = $request->no_pasien;
        $data = Pendaftaran::create([
            'pasien_id' => $no_pasien,
            'jadwal_dokter_id' => $id_jadwal,
            'tgl_pendaftaran' => date('Y-m-d'),
            'no_antrian' => $no_antrian,
            'status' => "Terdaftar"
        ]);
        return response([
            'success' => true,
            'message' => 'Berhasil Daftar',
        ],200);
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
        $pasien_id = $request->pasien_id;
        $jadwal_dokter_id = $request->jadwal_dokter_id;
        $pegawai = $request->pegawai_id;
        $tgl_daftar  = $request->tgl_pendaftaran;
        $no_antrian = Pendaftaran::generateNoAntrian($jadwal_dokter_id, $tgl_daftar);

        $saved = Pendaftaran::create([
            'pasien_id' => $pasien_id,
            'jadwal_dokter_id' => $jadwal_dokter_id,
            'pegawai_id' => $pegawai,
            'tgl_pendaftaran' => $tgl_daftar,
            'no_antrian' => $no_antrian
        ]);

        if($saved){
            return response([
                'success' => true,
                'message' => 'Data berhasil disimpan!'
            ],200);
        }else{
            return response([
                'success' => false,
                'message' => 'Data gagal disimpan!'
            ],401);
        }
    }


    public function hapus_daftar($id)
    {
        //
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        if($pendaftaran){
            return response([
                'success' => true,
                'message' => 'Data berhasil dihapus'
            ],200);
        }else{
            return response([
                'success' => true,
                'message' => 'Data gagal dihapus'
            ], 401);
        }
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
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        if($pendaftaran){
            return response([
                'success' => true,
                'message' => 'Data berhasil dihapus'
            ],200);
        }else{
            return response([
                'success' => true,
                'message' => 'Data gagal dihapus'
            ], 401);
        }
    }
}
