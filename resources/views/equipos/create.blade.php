<h1>➕ Crear Equipo</h1>

<form method="POST" action="{{ route('equipos.store') }}">
    @csrf

    <input name="nombre" placeholder="Nombre del equipo"><br><br>

    <input name="entrenador" placeholder="Entrenador"><br><br>

    <input name="ciudad" placeholder="Ciudad"><br><br>

    <button>Guardar</button>
</form>