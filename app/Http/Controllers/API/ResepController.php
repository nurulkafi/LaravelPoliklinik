<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Resep;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    //
    public function index(){
        $data = Resep::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Resep',
            'data' => $data
        ], 200);
    }
}
