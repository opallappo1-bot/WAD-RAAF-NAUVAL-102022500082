<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'nama',
        'nim',
        'prodi',
        'email',
        'password',
    ];
}


