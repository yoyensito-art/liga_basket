<x-app-layout>
    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-6xl mx-auto px-6">

            <div class="flex justify-between items-center mb-8">

    <!-- Botón volver -->
    <a href="{{ route('dashboard') }}"
       class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg shadow transition">
        ⬅ Volver al menú
    </a>

    <!-- Título -->
    <h1 class="text-4xl font-bold text-gray-800">
        👥 Gestión de Usuarios
    </h1>

    <!-- Espacio vacío o botón opcional -->
    <div></div>

</div>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                <table class="w-full text-left">

                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="p-3">ID</th>
                            <th class="p-3">Nombre</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Fecha</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr class="border-b">
                            <td class="p-3">{{ $user->id }}</td>
                            <td class="p-3">{{ $user->name }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3">{{ $user->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>
    </div>
</x-app-layout>