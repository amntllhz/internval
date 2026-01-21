<?php

namespace App\Models;

use Carbon\Carbon;
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
    
    public function dospemRequest()
    {
        return $this->belongsTo(Dospem::class, 'dospem_req_id');
    }

    public function dospemAccept()
    {
        return $this->belongsTo(Dospem::class, 'dospem_acc_id');
    }

    public function submissionsForSameStudent()
    {
        return $this->hasMany(Submission::class, 'nim', 'nim')
            ->orderBy('created_at');
    }

    public function scopeShouldExpire($query)
    {
        return $query
            ->where('status_pengajuan', 'pending')
            ->where('tenggat_pengajuan', '<', Carbon::today());
    }

    public function getSisaHariAttribute(): int
    {
        return Carbon::today()->diffInDays(
            $this->tenggat_pengajuan,
            false
        ) + 1;
    }

    protected $casts = [
        'resubmit' => 'boolean',
        'tanggal_lahir' => 'date',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'tenggat_pengajuan' => 'date',

    ];

    public static function isLimitReached(string $nim): bool
    {
        return self::where('nim', $nim)
            ->whereNotIn('status_pengajuan', ['rejected', 'expired'])
            ->count() >= 2;
    }

    public static function canSubmitAgain(string $nim): bool
    {
        $validSubmissions = self::where('nim', $nim)
            ->whereIn('status_pengajuan', ['pending', 'accepted'])
            ->orderBy('created_at')
            ->get();

        // ✅ Pengajuan pertama selalu boleh
        if ($validSubmissions->count() === 0) {
            return true;
        }

        // ⛔ Pengajuan kedua → cek izin admin
        $first = $validSubmissions->first();

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
        'instansi_tujuan', 'tanggal_mulai', 'tanggal_selesai','tenggat_pengajuan','resubmit',
        'status_pengajuan', 'status_surat', 'alasan_penolakan',
        'provinsi', 'kabupaten_kota', 'kecamatan','desa_kelurahan','jalan','telepon_instansi', 
        'dospem_req_id', 'dospem_acc_id',
    ];
}
