<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pasien::get();
        return view('pasien.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pasien.create');
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
        $nik = $request->nik;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $noHp = $request->no_hp;
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
            $userSaved->assignRole(4);
            Pasien::create([
                'nik' => $nik,
                'nama' => $nama,
                'alamat' => $alamat,
                'no_hp' => $noHp,
                'jenis_kelamin' => $jk,
                'tgl_lahir' => $tgl_lahir,
                'user_id' => $userSaved->id
            ]);
        }
        return redirect('admin/pasien')->with('message', 'Data added Successfully');
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
        $pasien = Pasien::findOrFail($id);
        $user = User::findOrFail($pasien->user_id);
        return view('pasien.edit',compact('pasien','user'));
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
        $pasien = Pasien::findOrFail($id);
        $user = User::findOrFail($pasien->user_id);
        //
        $nik = $request->nik;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $noHp = $request->no_hp;
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
            $pasien->update([
                'nik' => $nik,
                'nama' => $nama,
                'alamat' => $alamat,
                'no_hp' => $noHp,
                'jenis_kelamin' => $jk,
                'tgl_lahir' => $tgl_lahir,
                'user_id' => $user->id
            ]);
        }
        return redirect('admin/pasien')->with('message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $user = User::findOrFail($pasien->user_id);

        $pasien->delete();
        if ($pasien) {
            $user->delete();
            return redirect('admin/pasien')->with('message', 'Data Delete Successfully');
        }
    }
}
