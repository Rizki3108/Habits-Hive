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
        'image',
    ];
    
    public $timestamps = true;

    public function deleteImage(){
        if($this->image && file_exists(public_path('images/artikel' . $this->image))){
            return unlink(public_path('images/artikel' . $this->image));
        }
    }
}
