<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pegawai::get();
        return view('pegawai.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
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
        $alamat = $request->alamat;
        $no_hp = $request->no_hp;
        $tgl_lahir = $request->tgl_lahir;
        $jk = $request->jk;
        $email = $request->email;
        $password = $request->password;

        $userSaved = User::create([
                'name' => $nama,
                'email' => $email,
                'password' => bcrypt($password)
            ]);

        if ($userSaved) {
            // 4 adalah id role pasien
            $userSaved->assignRole(2);
            Pegawai::create([
                'nama' => $nama,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'tgl_lahir' => $tgl_lahir,
                'jenis_kelamin' => $jk,
                'user_id' => $userSaved->id
            ]);
        }
        return redirect('admin/pegawai')->with('message', 'Data added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $user = User::findOrFail($pegawai->user_id);
        return view('pegawai.edit',compact('pegawai','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $user = User::findOrFail($pegawai->user_id);
        //
        $nama = $request->nama;
        $alamat = $request->alamat;
        $no_hp = $request->no_hp;
        $tgl_lahir = $request->tgl_lahir;
        $jk = $request->jk;
        $email = $request->email;
        $password = $request->password;

        $userSaved = $user->update([
                'name' => $nama,
                'email' => $email,
                'password' => bcrypt($password)
            ]);

        if ($userSaved) {
            $pegawai->update([
                'nama' => $nama,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'tgl_lahir' => $tgl_lahir,
                'jenis_kelamin' => $jk,
                'user_id' => $user->id
            ]);
        }
        return redirect('admin/pegawai')->with('message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $user = User::findOrFail($pegawai->user_id);

        $pegawai->delete();
        if ($pegawai) {
            $user->delete();
            return redirect('admin/pegawai')->with('message', 'Data Delete Successfully');
        }
    }
}
