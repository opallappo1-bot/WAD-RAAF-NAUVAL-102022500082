<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    public const KATEGORI = [
        'Teknologi',
        'Sains',
        'Fiksi',
        'Ekonomi & Bisnis',
        'Pendidikan',
    ];

    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'isbn',
        'tahun_terbit',
        'pengarang',
        'kategori',
    ];
}