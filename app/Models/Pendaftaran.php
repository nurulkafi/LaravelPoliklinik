<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = ['pasien_id','jadwal_dokter_id','users_id','status','tgl_pendaftaran','no_antrian'];

    public function generateNoAntrian($jadwal_dokter,$tgl){
        $no_antrian = self::where('jadwal_dokter_id',$jadwal_dokter)->where('tgl_pendaftaran',$tgl)
                      ->orderBy('no_antrian','DESC')->first();
        if($no_antrian == null){
            return 1;
        }else{
            $no_antrian = $no_antrian->no_antrian;
            $no_antrian = $no_antrian + 1;
            return $no_antrian;
        }
    }
}
