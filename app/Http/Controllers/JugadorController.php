<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
        $jugadores = Jugador::with('equipo')->get();

        return view('jugadores.index', compact('jugadores'));
    }

    public function create()
    {
        $equipos = Equipo::all();

        return view('jugadores.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        Jugador::create($request->all());

        return redirect()->route('jugadores.index');
    }

    public function edit($id)
    {
        $jugador = Jugador::findOrFail($id);

        $equipos = Equipo::all();

        return view('jugadores.edit', compact('jugador', 'equipos'));
    }

    public function update(Request $request, $id)
    {
        $jugador = Jugador::findOrFail($id);

        $jugador->update($request->all());

        return redirect()->route('jugadores.index');
    }

    public function destroy($id)
    {
        $jugador = Jugador::findOrFail($id);

        $jugador->delete();

        return redirect()->route('jugadores.index');
    }
}