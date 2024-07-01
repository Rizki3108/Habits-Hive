<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'judul_artikel',
        'deskripsi',
        'gambar',
    ];
    
    public $timestamps = true;
}
