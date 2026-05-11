<x-app-layout>

<div class="max-w-3xl mx-auto p-8 bg-white min-h-screen">

    <!-- BOTÓN VOLVER -->
    <a href="{{ route('partidos.index') }}"
       class="inline-block mb-6 bg-gray-800 hover:bg-black text-white px-5 py-3 rounded-xl shadow">

        ← Volver a Partidos

    </a>

    <!-- CARD -->
    <div class="bg-white shadow-2xl rounded-3xl p-8 border">

        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
            Registrar Partido
        </h1>

        <form action="{{ route('partidos.store') }}" method="POST">

            @csrf

            <!-- EQUIPO LOCAL -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Equipo Local
                </label>

                <select name="equipo_local_id"
                        class="w-full border rounded-xl p-3">

                    @foreach($equipos as $equipo)

                        <option value="{{ $equipo->id }}">
                            {{ $equipo->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>

            <!-- EQUIPO VISITANTE -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Equipo Visitante
                </label>

                <select name="equipo_visitante_id"
                        class="w-full border rounded-xl p-3">

                    @foreach($equipos as $equipo)

                        <option value="{{ $equipo->id }}">
                            {{ $equipo->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>

            <!-- PUNTOS LOCAL -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Puntos Equipo Local
                </label>

                <input type="number"
                       name="puntos_local"
                       class="w-full border rounded-xl p-3">

            </div>

            <!-- PUNTOS VISITANTE -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Puntos Equipo Visitante
                </label>

                <input type="number"
                       name="puntos_visitante"
                       class="w-full border rounded-xl p-3">

            </div>

            <!-- FECHA -->
            <div class="mb-8">

                <label class="block text-gray-700 font-semibold mb-2">
                    Fecha
                </label>

                <input type="date"
                       name="fecha"
                       class="w-full border rounded-xl p-3">

            </div>

            <!-- BOTÓN -->
            <div class="text-center">

                <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-xl shadow-lg">

                    Guardar Partido

                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>