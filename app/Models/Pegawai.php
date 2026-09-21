<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_pegawai',
        'nama_pegawai',
        'status_kehadiran',
        'waktu_hadir',
        'waktu_pulang',
        'keterangan',
    ];

    protected $casts = [
        'waktu_hadir'  => 'datetime:Y-m-d H:i:s',
        'waktu_pulang' => 'datetime:Y-m-d H:i:s',
    ];
}
