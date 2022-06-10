<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $fillable = ['user_id', 'poli_id','nama','tgl_lahir','jenis_kelamin','alamat','no_hp'];

    public function poli(){
        return $this->belongsTo(Poli::class);
    }
    public function jadwaldokter(){
        return $this->hasMany(JadwalDokter::class);
    }
}
