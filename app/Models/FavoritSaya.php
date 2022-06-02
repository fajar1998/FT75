<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritSaya extends Model
{
    use HasFactory;

    public function film()
    {
        return $this->belongsTo(ListFilm::class,'film_id','id');
    }
}
