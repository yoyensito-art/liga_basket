<x-app-layout>
    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Título -->
            <h1 class="text-4xl font-bold mb-10 text-gray-800">
                🏀 Panel de Gestión - Liga de Básquet
            </h1>

            <!-- Cards del sistema -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Usuarios (YA CONECTADO) -->
                <a href="{{ route('users.index') }}"
                   class="bg-blue-500 text-white p-6 rounded-2xl shadow-lg hover:scale-105 transition">
                    <h2 class="text-xl font-bold">👥 Usuarios</h2>
                    <p>Ver usuarios registrados</p>
                </a>

                <!-- Equipos -->
                <a href="{{ route('equipos.index') }}"
                   class="bg-orange-500 text-white p-6 rounded-2xl shadow-lg hover:scale-105 transition">
                    <h2 class="text-xl font-bold">🏀 Equipos</h2>
                    <p>Crear, editar y eliminar equipos</p>
                </a>

                <!-- Jugadores -->
                <a href="#"
                   class="bg-green-500 text-white p-6 rounded-2xl shadow-lg hover:scale-105 transition">
                    <h2 class="text-xl font-bold">🧍 Jugadores</h2>
                    <p>Gestión de jugadores por equipo</p>
                </a>

                <!-- Partidos -->
                <a href="#"
                   class="bg-purple-500 text-white p-6 rounded-2xl shadow-lg hover:scale-105 transition">
                    <h2 class="text-xl font-bold">🏆 Partidos</h2>
                    <p>Registro de encuentros</p>
                </a>

                <!-- Resultados -->
                <a href="#"
                   class="bg-red-500 text-white p-6 rounded-2xl shadow-lg hover:scale-105 transition">
                    <h2 class="text-xl font-bold">📊 Resultados</h2>
                    <p>Estadísticas y análisis</p>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>