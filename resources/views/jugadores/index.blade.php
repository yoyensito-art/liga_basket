<x-app-layout>

<div class="max-w-7xl mx-auto p-6 bg-white min-h-screen">

        <!-- BOTÓN VOLVER -->
    <a href="{{ route('dashboard') }}"
    class="inline-block mb-6 bg-gray-800 hover:bg-black text-white px-5 py-3 rounded-xl shadow">

        ← Volver al Menú

    </a>

    <!-- TÍTULO Y BOTÓN -->
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-black">
            Gestión de Jugadores
        </h1>

        <a href="{{ route('jugadores.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-xl shadow">

            + Nuevo Jugador

        </a>

    </div>

    <!-- TABLA -->
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border">

        <table class="w-full text-left">

            <thead class="bg-gray-200 text-black">

                <tr>
                    <th class="p-4">Nombre</th>
                    <th class="p-4">Edad</th>
                    <th class="p-4">Posición</th>
                    <th class="p-4">Número</th>
                    <th class="p-4">Equipo</th>
                    <th class="p-4">Acciones</th>
                </tr>

            </thead>

            <tbody>

                @foreach($jugadores as $jugador)

                <tr class="border-b hover:bg-gray-100 transition">

                    <td class="p-4 font-semibold">
                        {{ $jugador->nombre }}
                    </td>

                    <td class="p-4">
                        {{ $jugador->edad }}
                    </td>

                    <td class="p-4">
                        {{ $jugador->posicion }}
                    </td>

                    <td class="p-4">
                        #{{ $jugador->numero }}
                    </td>

                    <td class="p-4">
                        {{ $jugador->equipo->nombre }}
                    </td>

                    <td class="p-4 flex gap-2">

                        <a href="{{ route('jugadores.edit', $jugador->id) }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                            Editar

                        </a>

                        <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                                Eliminar

                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>