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

    public function submissionsForSameStudent()
    {
        return $this->hasMany(Submission::class, 'nim', 'nim')
            ->orderBy('created_at');
    }

    protected $casts = [
        'resubmit' => 'boolean'
    ];

    public static function isLimitReached(string $nim): bool
    {
        return self::where('nim', $nim)->count() >= 2;
    }

    public static function canSubmitAgain(string $nim): bool
    {
        $submissions = self::where('nim', $nim)->orderBy('id')->get();
        $count = $submissions->count();            

        if ($count === 0) {
            return true;
        }
        
        $first = $submissions->first(); // ini pasti pengajuan pertama (id paling kecil)

        return $first->resubmit === true;
    }

    public static function isNimAllowed(string $nim): bool
    {
        return Allowlist::where('nim', $nim)
            ->where('is_active', true)
            ->exists();
    }

    protected $fillable = [
        'nama_mahasiswa','email', 'nim', 'prodi', 'jenis_kelamin', 'telepon',
        'tempat_lahir', 'tanggal_lahir', 'alamat', 'judul_laporan',
        'instansi_tujuan', 'tanggal_mulai', 'tanggal_selesai','resubmit',
        'status_pengajuan', 'status_surat', 'alasan_penolakan',
        'provinsi', 'kabupaten_kota', 'kecamatan','desa_kelurahan','jalan','telepon_instansi', 'dospem_id',
    ];
}
