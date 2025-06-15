<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    //
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function booted()
    {
        parent::boot();
        
        static::creating(function ($model) {
        $model->id = strtoupper(Str::random(16));
        });
    }

    protected $fillable = [
        'nama_mahasiswa', 'nim', 'prodi',
        'instansi_tujuan', 'tanggal_mulai', 'tanggal_selesai',
        'status_pengajuan', 'status_surat', 'alasan_penolakan',
        'provinsi', 'kabupaten_kota', 'kecamatan','desa_kelurahan','jalan',
    ];
}
