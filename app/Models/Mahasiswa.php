<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'npm'; // kalau npm jadi primary key
    public $incrementing = false;  // karena bukan angka auto increment
    protected $keyType = 'string'; // kalau npm string

    protected $fillable = [
        'npm',
        'nidn',
        'nama'
    ];
}
