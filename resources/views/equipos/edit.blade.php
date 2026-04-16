<h1>✏ Editar Equipo</h1>

<form method="POST" action="{{ route('equipos.update', $equipo->id) }}">
    @csrf
    @method('PUT')

    <input name="nombre" value="{{ $equipo->nombre }}"><br><br>

    <input name="entrenador" value="{{ $equipo->entrenador }}"><br><br>

    <input name="ciudad" value="{{ $equipo->ciudad }}"><br><br>

    <button>Actualizar</button>
</form>