<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dospemdraft extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'nama_dpl',        
        'nim',
        'prodi',
        'nama_mahasiswa',
    ];
}
