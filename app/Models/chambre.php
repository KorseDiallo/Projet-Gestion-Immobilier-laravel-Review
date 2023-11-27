<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chambre extends Model
{
    use HasFactory;

    public function bien(){
        return $this->belongsTo(bien::class);
    }
}
