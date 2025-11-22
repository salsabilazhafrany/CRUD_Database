<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi (Mass Assignment).
     */
    protected $fillable = [
        'nama',
        'keahlian',
        'foto',
    ];
}