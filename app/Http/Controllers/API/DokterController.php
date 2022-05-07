<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\User;
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
        //
        $data = Dokter::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Data Dokter',
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
        //
        $kode_poli = $request->kode_poli;
        $nama = $request->nama;
        $jk = $request->jk;
        $tgl_lahir = $request->tgl_lahir;
        $alamat = $request->alamat;
        $no_hp = $request->no_hp;
        $email = $request->email;

        $emailChecked = $this->emailChecked($email);
        if($emailChecked == null){
            $userSaved = User::create([
                'name' => $nama,
                'email' => $email,
                'password' => bcrypt($tgl_lahir)
            ]);

            if ($userSaved) {
                $dokterSaved = Dokter::create([
                    'poli_id' => $kode_poli,
                    'user_id' => $userSaved->id,
                    'nama' => $nama,
                    'jenis_kelamin' => $jk,
                    'tgl_lahir' => $tgl_lahir,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp
                ]);
                if ($dokterSaved) {
                    return response([
                        'success' => true,
                        'message' => 'Data berhasil disimpan!'
                    ], 200);
                } else {
                    return response([
                        'success' => false,
                        'message' => 'Data gagal disimpan!'
                    ], 401);
                }
            } else {
                return response([
                    'success' => false,
                    'message' => 'Kesalahan simpan data users!'
                ], 401);
            }
        }else{
            return response([
                'success' => false,
                'message' => 'Email Sudah Dipakai'
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
        //
        $data = Dokter::whereId($id);
        if ($data->count() > 0) {
            return response([
                'success' => true,
                'message' => 'Detail Dokter',
                'data' => $data->first()
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Dokter Tidak Ada',
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
        $dokter = Dokter::findOrFail($id);
        $user = User::findOrFail($dokter->user_id);
        //
        $kode_poli = $request->kode_poli;
        $name = $request->nama;
        $jk = $request->jk;
        $tgl_lahir = $request->tgl_lahir;
        $alamat = $request->alamat;
        $no_hp = $request->no_hp;
        $email = $request->email;

        $array = [
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($tgl_lahir)
        ];
        $validate = $this->validatorDataUsers($array,$user->id);

        if($validate->fails()){
            return response([
                'success' => false,
                'message' => $validate->errors()
            ], 401);
        }else{
            $userSaved = $user->update([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($tgl_lahir)
            ]);
            if ($userSaved) {
                $dokterSaved = $dokter->update([
                    'poli_id' => $kode_poli,
                    'user_id' => $user->id,
                    'nama' => $name,
                    'jenis_kelamin' => $jk,
                    'tgl_lahir' => $tgl_lahir,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp
                ]);
                if ($dokterSaved) {
                    return response([
                        'success' => true,
                        'message' => 'Data berhasil diupdate!'
                    ], 200);
                } else {
                    return response([
                        'success' => false,
                        'message' => 'Data gagal diupdate!'
                    ], 401);
                }
            } else {
                return response([
                    'success' => false,
                    'message' => 'Kesalahan simpan data users!'
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
        //
        $Dokter = Dokter::findOrFail($id);
        $user = User::findOrFail($Dokter->user_id);

        $Dokter->delete();
        if ($Dokter) {
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'Dokter Berhasil dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Dokter Gagal dihapus!',
            ], 401);
        }
    }
}
