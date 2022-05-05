<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
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
        $data = Pegawai::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Pegawai',
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
        $alamat = $request->alamat;
        $noHp = $request->no_hp;
        $tgl_lahir = $request->tgl_lahir;
        $jk = $request->jk;
        $email = $request->email;

        $userSaved = User::create([
            'name' => $nama,
            'email' => $email,
            'password' => bcrypt($tgl_lahir)
        ]);

        if ($userSaved) {
            // 2 adalah id role Pegawai
            $userSaved->assignRole(2);
            $PegawaiSaved = Pegawai::create([
                'nama' => $nama,
                'alamat' => $alamat,
                'no_hp' => $noHp,
                'jenis_kelamin' => $jk,
                'tgl_lahir' => $tgl_lahir,
                'user_id' => $userSaved->id
            ]);

            if ($PegawaiSaved) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pegawai Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Pegawai Gagal Disimpan!',
                ], 401);
            }
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
        $data = Pegawai::whereId($id);
        if ($data->count() > 0) {
            return response([
                'success' => true,
                'message' => 'Detail Pegawai',
                'data' => $data->first()
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Pegawai Tidak Ada',
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
        $Pegawai = Pegawai::findOrFail($id);
        $user = User::findOrFail($Pegawai->user_id);
        //
        $nama = $request->nama;
        $alamat = $request->alamat;
        $noHp = $request->no_hp;
        $tgl_lahir = $request->tgl_lahir;
        $jk = $request->jk;
        $email = $request->email;

        $userSaved = $user->update([
            'name' => $nama,
            'email' => $email,
            'password' => bcrypt($tgl_lahir)
        ]);

        if ($userSaved) {
            $PegawaiSaved = $Pegawai->update([
                'nama' => $nama,
                'alamat' => $alamat,
                'no_hp' => $noHp,
                'jenis_kelamin' => $jk,
                'tgl_lahir' => $tgl_lahir,
                'user_id' => $user->id
            ]);

            if ($PegawaiSaved) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pegawai Berhasil Diubah!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Pegawai Gagal Diubah!',
                ], 401);
            }
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
        $Pegawai = Pegawai::findOrFail($id);
        $user = User::findOrFail($Pegawai->user_id);

        $Pegawai->delete();
        if ($Pegawai) {
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'Pegawai Berhasil dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Pegawai Gagal dihapus!',
            ], 401);
        }
    }
}
