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

    public function dospem()
    {
        return $this->belongsTo(Dospem::class, 'dospem_id');
    }

    protected $fillable = [
        'nama_mahasiswa','email', 'nim', 'prodi', 'jenis_kelamin', 'telepon',
        'instansi_tujuan', 'tanggal_mulai', 'tanggal_selesai',
        'status_pengajuan', 'status_surat', 'alasan_penolakan',
        'provinsi', 'kabupaten_kota', 'kecamatan','desa_kelurahan','jalan', 'dospem_id',
    ];
}
