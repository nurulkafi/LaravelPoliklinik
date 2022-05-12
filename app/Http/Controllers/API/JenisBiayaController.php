<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JadwalDokter;
use App\Models\JenisBiaya;
use Illuminate\Http\Request;

class JenisBiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = JenisBiaya::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Jenis Biaya',
            'data' => $data
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
        $nama = $request->nama;
        $tarif = $request->tarif;

        $saved = JenisBiaya::create([
            'nama' => $nama,
            'tarif' => $tarif
        ]);

        if ($saved) {
            # code...
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = JenisBiaya::whereId($id);
        if ($data->count() > 0) {
            return response([
                'success' => true,
                'message' => 'Detail Jenis Biaya',
                'data' => $data->first()
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Jenis Biaya Tidak Ada',
            ], 401);
        }
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
        $jenisbiaya = JenisBiaya::findOrFail($id);
        $nama = $request->nama;
        $tarif = $request->tarif;

        $saved =$jenisbiaya->update([
            'nama' => $nama,
            'tarif' => $tarif
        ]);

        if ($saved) {
            # code...
            return response([
                'success' => true,
                'message' => 'Data berhasil diupdate!'
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Data gagal diupdate!'
            ], 401);
        }
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
        $data = JenisBiaya::findOrFail($id);
        $data->delete();

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Jenis Biaya Berhasil dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Jenis Biaya Gagal dihapus!',
            ], 401);
        }
    }
}
