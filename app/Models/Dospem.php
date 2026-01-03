<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dospem extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'nama_dosen',
        'nidn',
        'email',
        'prodi'
    ];

    public function requestSubmissions()
    {
        return $this->hasMany(Submission::class, 'dospem_req_id');
    }

    public function acceptSubmissions()
    {
        return $this->hasMany(Submission::class, 'dospem_acc_id');
    }
}
