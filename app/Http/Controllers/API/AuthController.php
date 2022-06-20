<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class AuthController extends Controller
{
    //
    public function index(){
        $data = User::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Users',
            'data' => $data
        ], 200);
    }
    public function store(request $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email',$email)->first();
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $pasien = Pasien::where('user_id',$user->id)->first();
            return response([
                'success' => true,
                'message' => 'Success',
                'id' => $user->id,
                'pasien_id' => $pasien->id
            ], 200);
        }
        return response([
            'success' => false,
            'message' => 'failed',
        ], 200);
        // return response([
        //     'success' => false,
        //     'message' => 'List Users',
        // ], 200);
        // $role = $request->role;

        // $emailChecked = $this->emailChecked($email);
        // if ($emailChecked == null) {
        //     $saved = User::create([
        //         'name' => $name,
        //         'email' => $email,
        //         'password' => bcrypt($password)
        //     ]);

        //     if ($saved) {
        //         $saved->assignRole($role);
        //         return response()->json([
        //             'success' => true,
        //             'message' => 'User Berhasil Disimpan!',
        //         ], 200);
        //     } else {
        //         return response()->json([
        //             'success' => false,
        //             'message' => 'User Gagal Disimpan!',
        //         ], 401);
        //     }
        // }else{
        //     return response([
        //         'success' => false,
        //         'message' => 'Email Sudah Dipakai'
        //     ], 401);
        // }
    }
    public function show($id){
        $data = User::whereId($id)->first();
        return response([
            'success' => true,
            'message' => 'Detail Users',
            'data' => $data
        ], 200);
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User Berhasil dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User Gagal dihapus!',
            ], 401);
        }
    }

    public function update(request $request,$id){
        //
        $user = User::find($id);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;

        $array = [
            'name' =>$name,
            'email' => $email,
            'password' => bcrypt($password)
        ];
        $emailChecked =$this->validatorDataUsers($array,$id);
        if ($emailChecked->fails()) {
            return response([
                'success' => false,
                'message' => $emailChecked->errors()
            ], 401);
        } else {
            $saved = $user->update([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password)
            ]);
            if ($saved) {
                DB::table('model_has_roles')->where('model_id', $id)->delete();
                $user->assignRole($role);
                return response()->json([
                    'success' => true,
                    'message' => 'User Berhasil diubah!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User Gagal diubah!',
                ], 401);
            }
        }

    }
}
