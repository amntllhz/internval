<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allowlist extends Model
{
    //
    protected $fillable = [
        'nim',
        'prodi',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
