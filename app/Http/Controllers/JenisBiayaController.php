<?php

namespace App\Http\Controllers;

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
        return view('jenis_biaya.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jenis_biaya.create');
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
        
        $tarif = preg_replace('/[^0-9]/', '', $tarif);
        
        $saved = JenisBiaya::create([
            'nama' => $nama,
            'tarif' => $tarif
        ]);

        if ($saved) {
            return redirect('admin/jenis_biaya')->with('message', 'Data added Successfully');
        } else {
            return redirect('admin/jenis_biaya')->with('error', 'Data added Unsuccessfully');
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
        $data = JenisBiaya::findOrFail($id);
        return view('jenis_biaya.edit', compact('data'));
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

        $tarif = preg_replace('/[^0-9]/', '', $tarif);
        
        $saved = $jenisbiaya->update([
            'nama' => $nama,
            'tarif' => $tarif
        ]);

        if ($saved) {
            return redirect('admin/jenis_biaya')->with('message', 'Data update Successfully');
        } else {
            return redirect('admin/jenis_biaya')->with('error', 'Data update Unsuccessfully');
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

        return redirect('admin/jenis_biaya')->with('message', 'Data deleted Successfully');
    }
}
