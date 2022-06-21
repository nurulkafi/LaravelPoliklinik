<?php

namespace App\Http\Controllers;

use App\Models\DetailJenisBiaya;
use App\Models\JenisBiaya;
use App\Models\Pemeriksaan;
use App\Models\Pendaftaran;
use Auth;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Pembayaran;
use App\Models\Resep;

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
            ->where('pendaftaran.status','!=','Sudah Diperiksa')
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
        $data = Pendaftaran::select('pasien.nama AS pasien','pasien.id AS id')
            ->join('pasien', 'pasien.id', '=', 'pendaftaran.pasien_id')
            ->where('pendaftaran.id', $id)
            ->first();
        $jb = JenisBiaya::get();

        $data2 = Pemeriksaan::join('pendaftaran','pendaftaran.id','=', 'pemeriksaan.pendaftaran_id')
                ->where('pendaftaran.pasien_id',$data->id)
                ->get();

        $obat = Obat::get();

        return view('pemeriksaan.periksa',compact('jb','umur','data','data2','obat','id'));
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
        $jb = $request->jenis_biaya;
        $obat = $request->id_obat;
        $dosis = $request->dosis;
        $jumlah = $request->jumlah;
        $perawatan = $request->perawatan;
        $tindakan = $request->tindakan;


        $pemeriksaan = Pemeriksaan::create([
            'pendaftaran_id' => $id,
            'berat_badan' => $request->bb,
            'tensi_darah' => $request->tensi_darah,
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
            'perawatan' => $request->perawatan,
            'tindakan' => $request->tindakan
        ]);
        if($pemeriksaan){
            //simpan ke detail jenis biaya
            for ($i=0; $i < count($jb); $i++) {
                DetailJenisBiaya::create([
                    'pendaftaran_id' => $id,
                    'jenis_biaya_id' => $jb[$i]
                ]);
            }
            //simpan ke resep
            for ($i = 0; $i < count($obat); $i++) {
                Resep::create([
                    'pemeriksaan_id' => $pemeriksaan->id,
                    'obat_id' => $obat[$i],
                    'dosis' => $dosis[$i],
                    'jumlah' => $jumlah[$i]
                ]);
            }
            //Simpan Ke Pembayaran
            Pembayaran::create([
                'status' => "Belum Bayar",
                'pendaftaran_id' => $id,
            ]);
            //Update Status Pendaftaran
            $daftar = Pendaftaran::findOrFail($id);
            $daftar->update([
                'status' => 'Sudah Diperiksa'
            ]);
        }
        return redirect('admin/pemeriksaan')->with('message','Pemeriksaan Selesai!');
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
