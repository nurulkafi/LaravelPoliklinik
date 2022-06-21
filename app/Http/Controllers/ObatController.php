<?php

namespace App\Http\Controllers;

use App\Models\Obat;
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
        $data = Obat::get();
        return view('obat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.create');
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
        $merk = $request->merk;
        $satuan = $request->satuan;
        $harga = $request->harga;

        $harga = preg_replace('/[^0-9]/', '', $harga);

        Obat::create([
            'nama' => $nama,
            'merk' => $merk,
            'satuan' => $satuan,
            'harga_jual' => $harga
        ]);

        return redirect('admin/obat')->with('message', 'Data added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.edit',compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $obat = Obat::findOrFail($id);
        //
        $nama = $request->nama;
        $merk = $request->merk;
        $satuan = $request->satuan;
        $harga = $request->harga;
        $harga = preg_replace('/[^0-9]/', '', $harga);
        $obat->update([
            'nama' => $nama,
            'merk' => $merk,
            'satuan' => $satuan,
            'harga_jual' => $harga
            ]);

        return redirect('admin/obat')->with('message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return redirect('admin/obat')->with('message', 'Data Delete Successfully');
    }
}
