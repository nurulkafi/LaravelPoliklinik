<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Poli::get();
        return view('poli.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poli.create');
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
        $deskripsi = $request->deskripsi;
        $uploadFolder = 'poli-images';
        $image = $request->file('image');
        $image_uploaded_path = $image->store($uploadFolder, 'public');

        Poli::create([
            'kode_poli' => Poli::kodeOtomatis(),
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'image' => $uploadFolder . '/'  . basename($image_uploaded_path)
        ]);
        return redirect('admin/poli')->with('message', 'Data added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poli = Poli::where('kode_poli',$id)->first();
        return view('poli.edit',compact('poli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $poli = Poli::where('kode_poli',$id)->first();
        $nama = $request->nama;
        $deskripsi = $request->deskripsi;

        $uploadFolder = 'poli-images';
        $image = $request->file('image');
        if ($image == "") {
            $poli->update([
                'nama' => $nama,
                'deskripsi' => $deskripsi,
            ]);
            return redirect('admin/poli')->with('message', 'Data updated Successfully');
        }else{
            Storage::delete('public/' . $poli->image);
            $image_uploaded_path = $image->store($uploadFolder, 'public');
            $poli->update([
                'nama' => $nama,
                'deskripsi' => $deskripsi,
                'image' => $uploadFolder . '/'  . basename($image_uploaded_path)
            ]);
            return redirect('admin/poli')->with('message', 'Data added Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poli = Poli::where('kode_poli',$id);
        $poli2 = Poli::where('kode_poli',$id)->first();
        Storage::delete($poli2->image);
        $poli->delete();
        return redirect('admin/poli')->with('message', 'Data deleted Successfully');
    }
}
