<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengingat extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'judul_pengingat',
        'deskripsi',
        'tanggal',
        'image',
        'catatan_id',
    ];

    public $timestamps = true;

    public function catatan()
    {
        return $this->belongsTo(Catatan::class);
    }

    public function deleteImage(){
        if($this->image && file_exists(public_path('images/pengingat' . $this->image))){
            return unlink(public_path('images/pengingat' . $this->image));
        }
    }
}
