<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'judul_catatan',
        'deskripsi',
        'tanggal',
        'image',
    ];
}
