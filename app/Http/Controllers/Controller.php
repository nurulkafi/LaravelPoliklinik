<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function emailChecked($email){
        $checked = User::where('email', $email)->first();
        return $checked;
    }
    public function validatorDataUsers(array $data,$id)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['required', 'string', 'min:8']
        ],
        [
            'name.required' => 'nama tidak boleh kosong',
            'email.required' => 'nama tidak boleh kosong',
            'password.required' => 'nama tidak boleh kosong',
            'email.unique' => 'email sudah dipakai!',
        ]);

    }
}
