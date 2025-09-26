<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pegawai extends Model
{
     use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama', 'jabatan', 'alamat', 'telepon', 'email', 'tgl_masuk', 'gaji','photo_path'
    ];
}
