<x-app-layout>
    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto px-6">

           <div class="flex justify-between items-center mb-8">

    <!-- Botón volver -->
    <a href="{{ route('dashboard') }}"
       class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg shadow transition">
        ⬅ Volver al menú
    </a>

    <!-- Título -->
    <h1 class="text-4xl font-bold text-gray-800">
        🏀 Gestión de Equipos
    </h1>

    <!-- Botón crear -->
    <a href="{{ route('equipos.create') }}"
       class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-lg shadow-lg transition">
        + Nuevo Equipo
    </a>

</div>
            <!-- Mensaje vacío -->
            @if($equipos->isEmpty())
                <div class="text-center text-gray-500 mt-20">
                    No hay equipos registrados 🏀
                </div>
            @endif

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                @foreach($equipos as $equipo)

                    <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-orange-500 hover:scale-105 transition">

                        <!-- Nombre -->
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">
                            {{ $equipo->nombre }}
                        </h2>

                        <!-- Ciudad (ya que tú sí la tienes en BD) -->
                        <p class="text-gray-600 mb-2">
                            🌆 Ciudad: {{ $equipo->ciudad }}
                        </p>

                        <!-- Entrenador (seguro contra NULL) -->
                        <p class="text-gray-600 mb-4">
                            🧑‍🏫 Entrenador:
                            {{ $equipo->entrenador ?? 'No registrado' }}
                        </p>

                        <!-- Acciones -->
                        <div class="flex justify-between items-center mt-4">

                            <!-- Editar -->
                            <a href="{{ route('equipos.edit', $equipo->id) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm">
                                Editar
                            </a>

                            <!-- Eliminar -->
                            <form method="POST" action="{{ route('equipos.destroy', $equipo->id) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm">
                                    Eliminar
                                </button>
                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>
    </div>
</x-app-layout>