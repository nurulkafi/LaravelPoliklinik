<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;
    protected $table = 'poli';
    protected $fillable =['kode_poli','nama','deskripsi'];
    public function kodeOtomatis()
    {
        $poli = Poli::orderBy('kode_poli', 'DESC')->first();

        if ($poli != null) {
            $urutan = substr($poli->kode_poli, 1);
            $urutan = $urutan + 1;
            $huruf = "P";
            $kode = $huruf . sprintf('%04s', $urutan);
            return $kode;
        } else {
            $urutan = 1;
            $huruf = "P";
            $kode = $huruf . sprintf('%04s', $urutan);
            return $kode;
        }
    }
}
