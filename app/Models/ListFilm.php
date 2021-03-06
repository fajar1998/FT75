<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListFilm extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori','id');
    }
}
