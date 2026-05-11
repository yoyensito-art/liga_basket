<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class EstadisticaController extends Controller
{
    public function index()
    {
        $totalPartidos = DB::table('partidos')->count();

        $totalPuntos = DB::table('partidos')
            ->sum(DB::raw('puntos_local + puntos_visitante'));

        $victoriasLocal = DB::table('partidos')
            ->whereColumn('puntos_local', '>', 'puntos_visitante')
            ->count();

        $victoriasVisitante = DB::table('partidos')
            ->whereColumn('puntos_visitante', '>', 'puntos_local')
            ->count();

        $empates = DB::table('partidos')
            ->whereColumn('puntos_local', '=', 'puntos_visitante')
            ->count();

        // puntos por equipo local
        $ranking = DB::table('partidos')
            ->select(
                'equipo_local_id',
                DB::raw('SUM(puntos_local) as puntos')
            )
            ->groupBy('equipo_local_id')
            ->orderByDesc('puntos')
            ->get();

        return view('estadisticas.index', compact(
            'totalPartidos',
            'totalPuntos',
            'victoriasLocal',
            'victoriasVisitante',
            'empates',
            'ranking'
        ));
    }
}