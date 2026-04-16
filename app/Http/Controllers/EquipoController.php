<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Mostrar lista de equipos
     */
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipos.index', compact('equipos'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Guardar nuevo equipo
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required'
        ]);

        Equipo::create([
            'nombre' => $request->nombre,
            'ciudad' => $request->ciudad
        ]);

        return redirect()->route('equipos.index');
    }

    /**
     * Mostrar un equipo (opcional)
     */
    public function show(Equipo $equipo)
    {
        return view('equipos.show', compact('equipo'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    /**
     * Actualizar equipo
     */
    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required'
        ]);

        $equipo->update([
            'nombre' => $request->nombre,
            'ciudad' => $request->ciudad
        ]);

        return redirect()->route('equipos.index');
    }

    /**
     * Eliminar equipo
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();

        return redirect()->route('equipos.index');
    }
}