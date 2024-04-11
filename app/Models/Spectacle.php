<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spectacle extends Model
{
    use HasFactory;
    protected $fillable = [
        'salleID','pieceID','datespectacle'
        
        ];
        public function salles()
        {
        return $this->belongsTo(Salle::class,"salleID");
        }
}
