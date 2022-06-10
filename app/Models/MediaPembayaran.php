<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPembayaran extends Model
{
    use HasFactory;
    protected $table = 'media_pembayaran';
    protected $guarded = [];
}
