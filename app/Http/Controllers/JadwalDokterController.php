<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JadwalDokter::get();
        return view('jadwal_dokter.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwal_dokter.create',[
            'dokter' => Dokter::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hari = $request->hari;
        $dokter = $request->dokter;
        $jam_mulai = $request->jam_mulai;
        $jam_selesai = $request->jam_selesai;

        JadwalDokter::create([
            'hari' => $hari,
            'dokter_id' => $dokter,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai
        ]);
        return redirect('admin/jadwal_dokter')->with('message', 'Data added Successfully');

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
        $jadwal_dokter = JadwalDokter::findOrFail($id);
        return view('jadwal_dokter.edit',[
            'dokter' => Dokter::all()
        ],compact('jadwal_dokter'));
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
        $jadwal_dokter = JadwalDokter::findOrFail($id);

        $hari = $request->hari;
        $dokter = $request->dokter;
        $jam_mulai = $request->jam_mulai;
        $jam_selesai = $request->jam_selesai;

        $jadwal_dokter->update([
            'hari' => $hari,
            'dokter_id' => $dokter,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai
        ]);
        return redirect('admin/jadwal_dokter')->with('message', 'Data added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal_dokter = JadwalDokter::findOrFail($id);
        $jadwal_dokter->delete();
        return redirect('admin/jadwal_dokter')->with('message', 'Data Delete Successfully');
    }
}
