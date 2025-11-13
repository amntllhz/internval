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

    public function submissions()
    {
        return $this->hasMany(Submission::class, 'dospem_id');
    }
}
