<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipo;

class Jugador extends Model
{
    protected $fillable = [
        'nombre',
        'edad',
        'posicion',
        'numero',
        'equipo_id'
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}