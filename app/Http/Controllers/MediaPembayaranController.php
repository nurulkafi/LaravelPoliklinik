<?php

namespace App\Http\Controllers;

use App\Models\MediaPembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MediaPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = MediaPembayaran::get();
        return view('media_pembayaran.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('media_pembayaran.create');
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
        $atas_nama = $request->atas_nama;
        $no_rek = $request->norek;
        $uploadFolder = 'media_pembayaran';
        $image = $request->file('image');
        $image_uploaded_path = $image->store($uploadFolder, 'public');

        MediaPembayaran::create([
            'nama_bank' => $nama,
            'no_rekening' => $no_rek,
            'atas_nama' => $atas_nama,
            'logo' => $uploadFolder . '/'  . basename($image_uploaded_path)
        ]);
        return redirect('admin/media_pembayaran')->with('message', 'Data added Successfully');

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
        $data = MediaPembayaran::findOrFail($id);
        return view('media_pembayaran.edit',compact('data'));
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
        $media_pem = MediaPembayaran::findOrFail($id);
        $nama = $request->nama;
        $atas_nama = $request->atas_nama;
        $no_rek = $request->norek;

        $uploadFolder = 'media_pembayaran';
        $image = $request->file('image');
        if ($image == "") {
            $media_pem->update([
                'nama_bank' => $nama,
                'no_rekening' => $no_rek,
                'atas_nama' => $atas_nama,
            ]);
            return redirect('admin/media_pembayaran')->with('message', 'Data added Successfully');
        }else{
            Storage::delete('public/' . $media_pem->logo);
            $image_uploaded_path = $image->store($uploadFolder, 'public');
            $media_pem->update([
                'nama_bank' => $nama,
                'no_rekening' => $no_rek,
                'atas_nama' => $atas_nama,
                'logo' => $uploadFolder . '/'  . basename($image_uploaded_path)
            ]);
            return redirect('admin/media_pembayaran')->with('message', 'Data added Successfully');
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
        $data = MediaPembayaran::findOrFail($id);
        // if (\File::exists(public_path($data->logo))) {
            Storage::delete('public/'.$data->logo);
            $data->delete();
            return redirect('admin/media_pembayaran')->with('message', 'Data delete Successfully');
        // }
    }
}