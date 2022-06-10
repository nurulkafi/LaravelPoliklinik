<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\User;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Dokter::get();
        return view('dokter.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokter.create',[
            'poli' => Poli::all()
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
        $nama = $request->nama;
        $poli = $request->poli;
        $noHp = $request->no_hp;
        $jk = $request->jk;
        $tgl_lahir = $request->tgl_lahir;
        $alamat = $request->alamat;
        $email = $request->email;
        $password = $request->password;

        $userSaved = User::create([
            'name' => $nama,
            'email' => $email,
            'password' => $password
        ]);

        if ($userSaved) {
            // 4 adalah id role pasien
            $userSaved->assignRole(3);
            Dokter::create([
                'nama' => $nama,
                'poli_id' => $poli,
                'tgl_lahir' => $tgl_lahir,
                'no_hp' => $noHp,
                'jenis_kelamin' => $jk,
                'alamat' => $alamat,
                'user_id' => $userSaved->id
            ]);
        }
        return redirect('admin/dokter')->with('message', 'Data added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        $user = User::findOrFail($dokter->user_id);
        return view('dokter.edit',[
            'poli' => Poli::all()
        ],compact('dokter','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dokter = dokter::findOrFail($id);
        $user = User::findOrFail($dokter->user_id);

        $nama = $request->nama;
        $poli = $request->poli;
        $noHp = $request->no_hp;
        $jk = $request->jk;
        $tgl_lahir = $request->tgl_lahir;
        $alamat = $request->alamat;
        $email = $request->email;
        $password = $request->password;

        $userSaved = $user->update([
            'name' => $nama,
            'email' => $email,
            'password' => $password
        ]);

        if ($userSaved) {
            $dokter->update([
                'nama' => $nama,
                'poli_id' => $poli,
                'tgl_lahir' => $tgl_lahir,
                'no_hp' => $noHp,
                'jenis_kelamin' => $jk,
                'alamat' => $alamat,
                'user_id' => $user->id
            ]);
        }
        return redirect('admin/dokter')->with('message', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $user = User::findOrFail($dokter->user_id);

        $dokter->delete();
        if ($dokter) {
            $user->delete();
            return redirect('admin/dokter')->with('message', 'Data deleted Successfully');
        }
    }
}
