<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailJenisBiaya;
use Illuminate\Http\Request;

class DetailJenisBiayaController extends Controller
{
    //
    public function show($id){
        $jenis_biaya =
            DetailJenisBiaya::where('pendaftaran_id', $value->id)
            ->join('jenis_biaya', 'jenis_biaya.id', '=', 'detail_jenis_biaya.jenis_biaya_id')
            ->get();
        return response([
            'success' => true,
            'message' => 'List Jenis Biaya',
            'data' => $jenis_biaya
        ], 200);

    }
}
