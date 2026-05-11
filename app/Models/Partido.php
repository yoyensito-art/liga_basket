<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipo;

class Partido extends Model
{
    protected $fillable = [
        'equipo_local_id',
        'equipo_visitante_id',
        'puntos_local',
        'puntos_visitante',
        'fecha'
    ];

    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }
}