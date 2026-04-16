<h1>🏀 Equipos</h1>

@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('equipos.create') }}">➕ Crear equipo</a>

<hr>

@foreach($equipos as $equipo)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        
        <h3>{{ $equipo->nombre }}</h3>

        <p><b>Entrenador:</b> {{ $equipo->entrenador }}</p>
        <p><b>Ciudad:</b> {{ $equipo->ciudad }}</p>

        <a href="{{ route('equipos.edit', $equipo->id) }}">✏ Editar</a>

        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')

            <button onclick="return confirm('¿Eliminar equipo?')">
                🗑 Eliminar
            </button>
        </form>

    </div>
@endforeach