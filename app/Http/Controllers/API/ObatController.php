<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use App\Models\Resep;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Obat::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Obat',
            'data' => $data
        ], 200);
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
        $nama = $request->nama;
        $satuan = $request->satuan;
        $harga = $request->harga;

        $saved = Obat::create([
            'nama' => $nama,
            'satuan' => $satuan,
            'harga_jual' => $harga
        ]);
        if ($saved) {
            return response()->json([
                'success' => true,
                'message' => 'Obat Berhasil Disimpan!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Obat Gagal Disimpan!',
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
        $data = Obat::whereId($id);
        if($data->count() > 0){
            return response([
                'success' => true,
                'message' => 'Detail Obat',
                'data' => $data->first()
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Obat Tidak Ada',
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
        $resep = Resep::where('pemeriksaan_id',$id)->get();
        $totalhargaobat = 0;
        foreach ($resep as $key => $value) {
            $obat = $value->obat_id;
            $obats = Obat::findOrFail($obat);
            $totalhargaobat = $totalhargaobat + $obats->harga * $value->jumlah;
        }
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
        $obat = Obat::find($id);
        $nama = $request->nama;
        $satuan = $request->satuan;
        $harga = $request->harga;

        $saved = $obat->update([
            'nama' => $nama,
            'satuan' => $satuan,
            'harga_jual' => $harga
        ]);
        if ($saved) {
            return response()->json([
                'success' => true,
                'message' => 'Obat Berhasil diubah!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Obat Gagal diubah!',
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
        $data = Obat::findOrFail($id);
        $data->delete();

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Obat Berhasil dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Obat Gagal dihapus!',
            ], 401);
        }
    }
}
