<x-app-layout>

<div class="max-w-3xl mx-auto p-8 bg-white min-h-screen">

    <!-- BOTÓN VOLVER -->
    <a href="{{ route('jugadores.index') }}"
       class="inline-block mb-6 bg-gray-800 hover:bg-black text-white px-5 py-3 rounded-xl shadow">

        ← Volver a Jugadores

    </a>

    <!-- CARD -->
    <div class="bg-white shadow-2xl rounded-3xl p-8 border">

        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
            Editar Jugador
        </h1>

        <form action="{{ route('jugadores.update', $jugador->id) }}" method="POST">

            @csrf
            @method('PUT')

            <!-- NOMBRE -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Nombre
                </label>

                <input type="text"
                       name="nombre"
                       value="{{ $jugador->nombre }}"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- EDAD -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Edad
                </label>

                <input type="number"
                       name="edad"
                       value="{{ $jugador->edad }}"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- POSICIÓN -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Posición
                </label>

                <select name="posicion"
                        class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

                    <option value="Base"
                        {{ $jugador->posicion == 'Base' ? 'selected' : '' }}>
                        Base (Point Guard)
                    </option>

                    <option value="Escolta"
                        {{ $jugador->posicion == 'Escolta' ? 'selected' : '' }}>
                        Escolta (Shooting Guard)
                    </option>

                    <option value="Alero"
                        {{ $jugador->posicion == 'Alero' ? 'selected' : '' }}>
                        Alero (Small Forward)
                    </option>

                    <option value="Ala-Pívot"
                        {{ $jugador->posicion == 'Ala-Pívot' ? 'selected' : '' }}>
                        Ala-Pívot (Power Forward)
                    </option>

                    <option value="Pívot"
                        {{ $jugador->posicion == 'Pívot' ? 'selected' : '' }}>
                        Pívot (Center)
                    </option>

                </select>

            </div>

            <!-- NÚMERO -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Número
                </label>

                <input type="number"
                       name="numero"
                       value="{{ $jugador->numero }}"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- EQUIPO -->
            <div class="mb-8">

                <label class="block text-gray-700 font-semibold mb-2">
                    Equipo
                </label>

                <select name="equipo_id"
                        class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

                    @foreach($equipos as $equipo)

                        <option value="{{ $equipo->id }}"
                            {{ $jugador->equipo_id == $equipo->id ? 'selected' : '' }}>

                            {{ $equipo->nombre }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- BOTÓN -->
            <div class="text-center">

                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-xl shadow-lg transition">

                    Actualizar Jugador

                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>