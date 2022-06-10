<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use App\Models\Pasien;
use App\Models\Pendaftaran;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    //
    public function index(){
        $data = Pendaftaran::select('pendaftaran.id AS id','dokter.nama AS dokter','pasien.nama AS pasien','poli.nama AS poli','no_antrian','tgl_pendaftaran','status')
                ->join('jadwal_dokter','jadwal_dokter.id','=','pendaftaran.jadwal_dokter_id')
                ->join('dokter','dokter.id','=','jadwal_dokter.dokter_id')
                ->join('poli','poli.kode_poli','=','dokter.poli_id')
                ->join('pasien','pasien.id','=','pendaftaran.pasien_id')
                ->orderBy('tgl_pendaftaran', 'DESC')
                ->get();
        return view('pendaftaran.index',compact('data'));
    }
    public function create(){
        $mytime = Carbon::now('Asia/Jakarta');
        // echo $mytime->isoFormat('dddd');
        $data = JadwalDokter::where('hari',$mytime->isoFormat('dddd'))
                ->select('jadwal_dokter.id AS id','dokter.nama AS nama','poli.nama AS poli')
                ->join('dokter', 'dokter.id', '=', 'jadwal_dokter.dokter_id')
                ->join('poli', 'poli.kode_poli', '=', 'dokter.poli_id')
                ->where('jam_selesai',">", $mytime->isoFormat('H:m:s'))
                ->get();
        $pasien = Pasien::get();
        return view('pendaftaran.create', compact('data','pasien'));
    }
    public function store(Request $request){
        $id_jadwal = $request->jadwal_dokter;
        $no_antrian = Pendaftaran::generateNoAntrian($id_jadwal,date('Y-m-d'));
        $no_pasien = $request->no_pasien;
        $users = Auth::id();
        $saved = Pendaftaran::create([
            'pasien_id' => $no_pasien,
            'jadwal_dokter_id' => $id_jadwal,
            'users_id' => $users,
            'tgl_pendaftaran' => date('Y-m-d'),
            'no_antrian' => $no_antrian,
            'status' => "Terdaftar"
        ]);
        return redirect('admin/pendaftaran/'.$saved->id);
    }
    public function show($id){
        $data = Pendaftaran::findOrFail($id);
        return view('pendaftaran.show',compact('data'));
    }
    public function destroy($id){
        $data = Pendaftaran::findOrFail($id);
        $data->delete();
        return redirect('admin/pendaftaran/')->with('message','Delete Success!');
    }
}
