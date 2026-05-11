<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jugador;

class Equipo extends Model
{
    protected $table = 'equipos';

    protected $fillable = [
        'nombre',
        'ciudad',
        'entrenador'
    ];

    public function jugadores(){
        return $this->hasMany(Jugador::class);
    }
}