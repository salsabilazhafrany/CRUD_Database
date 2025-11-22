<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'pakets';

    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga',
        'foto'
    ];
}
