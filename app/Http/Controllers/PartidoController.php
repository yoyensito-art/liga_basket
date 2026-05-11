<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartidoController extends Controller
{
    // 📊 DASHBOARD PRINCIPAL
   public function index()
{
    $partidos = Partido::with('equipoLocal', 'equipoVisitante')
    ->orderBy('fecha', 'desc')
    ->get();

    $totalPuntos = Partido::sum(DB::raw('puntos_local + puntos_visitante'));
    $totalPartidos = Partido::count();

    $promedioPuntos = $totalPartidos > 0
        ? round($totalPuntos / $totalPartidos, 2)
        : 0;

    // TABLA DE POSICIONES
    $equipos = Equipo::all();
    $tabla = [];

    foreach ($equipos as $equipo) {

        $local = Partido::where('equipo_local_id', $equipo->id)->get();
        $visitante = Partido::where('equipo_visitante_id', $equipo->id)->get();

        $pj = $local->count() + $visitante->count();

        $gf = $local->sum('puntos_local') + $visitante->sum('puntos_visitante');
        $gc = $local->sum('puntos_visitante') + $visitante->sum('puntos_local');

        $pg = 0;
        $pe = 0;
        $pp = 0;

        foreach ($local as $p) {
            if ($p->puntos_local > $p->puntos_visitante) $pg++;
            elseif ($p->puntos_local == $p->puntos_visitante) $pe++;
            else $pp++;
        }

        foreach ($visitante as $p) {
            if ($p->puntos_visitante > $p->puntos_local) $pg++;
            elseif ($p->puntos_visitante == $p->puntos_local) $pe++;
            else $pp++;
        }

        $tabla[] = [
            'equipo' => $equipo->nombre,
            'pj' => $pj,
            'pg' => $pg,
            'pe' => $pe,
            'pp' => $pp,
            'pf' => $gf,
            'pc' => $gc,
            'dp' => $gf - $gc,
            'puntos' => ($pg * 3) + $pe
        ];
    }

    $tabla = collect($tabla)->sortByDesc('puntos');

    return view('partidos.index', compact(
        'partidos',
        'totalPuntos',
        'totalPartidos',
        'promedioPuntos',
        'tabla'
    ));
}
    // ➕ CREAR
    public function create()
    {
        $equipos = Equipo::all();
        return view('partidos.create', compact('equipos'));
    }

    // 💾 GUARDAR
    public function store(Request $request)
    {
        Partido::create($request->except('_token'));
        return redirect()->route('partidos.index');
    }

    // ✏️ EDITAR
    public function edit($id)
    {
        $partido = Partido::findOrFail($id);
        $equipos = Equipo::all();

        return view('partidos.edit', compact('partido', 'equipos'));
    }

    // 🔄 ACTUALIZAR
    public function update(Request $request, $id)
    {
        $partido = Partido::findOrFail($id);
        $partido->update($request->except('_token', '_method'));

        return redirect()->route('partidos.index');
    }

    // ❌ ELIMINAR
    public function destroy($id)
    {
        $partido = Partido::findOrFail($id);
        $partido->delete();

        return redirect()->route('partidos.index');
    }
}