<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        $data = Pasien::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Pasien',
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
        $nik = $request->nik;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $noHp = $request->no_hp;
        $tgl_lahir = $request->tgl_lahir;
        $jk = $request->jk;
        $email = $request->email;

        
        $userSaved = User::create([
            'name' => $nama,
            'email' => $email,
            'password' => bcrypt($request->password)
        ]);

        if($userSaved){
            // 4 adalah id role pasien
            $userSaved->assignRole(4);
            $pasienSaved = Pasien::create([
                'nik' => $nik,
                'nama' => $nama,
                'alamat' =>$alamat,
                'no_hp' => $noHp,
                'jenis_kelamin' => $jk,
                'tgl_lahir' => $tgl_lahir,
                'user_id' => $userSaved->id
            ]);

            if ($pasienSaved) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pasien Berhasil Disimpan!'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Pasien Gagal Disimpan!'
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
        $data = Pasien::whereId($id);
        if ($data->count() > 0) {
            return response([
                'success' => true,
                'message' => 'Detail Pasien',
                'data' => $data->first()
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Pasien Tidak Ada',
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
        $pasien = Pasien::findOrFail($id);
        //
        $nik = $request->nik;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $noHp = $request->no_hp;
        $tgl_lahir = $request->tgl_lahir;
        $jk = $request->jk;
        
        $pasienSaved = $pasien->update([
                'nik' => $nik,
                'nama' => $nama,
                'alamat' => $alamat,
                'no_hp' => $noHp,
                'jenis_kelamin' => $jk,
                'tgl_lahir' => $tgl_lahir
            ]);

            if ($pasienSaved) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pasien Berhasil Diubah!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Pasien Gagal Diubah!',
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
        $pasien = Pasien::findOrFail($id);
        $user = User::findOrFail($pasien->user_id);

        $pasien->delete();
        if ($pasien) {
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'Pasien Berhasil dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Pasien Gagal dihapus!',
            ], 401);
        }

    }
}
