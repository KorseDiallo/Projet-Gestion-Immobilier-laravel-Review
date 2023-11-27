<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class commentaire extends Model
{
    use HasFactory;
    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }
}
