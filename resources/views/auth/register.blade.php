<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[url('https://images.unsplash.com/photo-1519861531473-9200262188bf')] bg-cover bg-center">

        <!-- Overlay oscuro -->
        <div class="absolute inset-0 bg-black/70"></div>

        <div class="relative w-full sm:max-w-md bg-white/95 backdrop-blur-md p-8 rounded-2xl shadow-2xl border-t-4 border-orange-500">

            <!-- Título -->
            <h2 class="text-3xl font-bold text-center mb-2 text-gray-800">
                🏀 Basket System
            </h2>

            <p class="text-center text-gray-500 mb-6">
                Crear nueva cuenta
            </p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-black" />
                    <x-text-input id="name"
                        class="block mt-1 w-full rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required autofocus autocomplete="name" />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-black" />
                    <x-text-input id="email"
                        class="block mt-1 w-full rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autocomplete="username" />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-black" />
                    <x-text-input id="password"
                        class="block mt-1 w-full rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-black" />
                    <x-text-input id="password_confirmation"
                        class="block mt-1 w-full rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                        type="password"
                        name="password_confirmation"
                        required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Botón -->
                <div class="flex items-center justify-between mt-6">

                    <a class="text-sm text-orange-600 hover:underline"
                       href="{{ route('login') }}">
                        ¿Ya tienes cuenta?
                    </a>

                    <x-primary-button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg shadow-lg">
                        Registrarse
                    </x-primary-button>

                </div>

            </form>

            <!-- Footer -->
            <p class="text-center text-xs text-gray-500 mt-6">
                Sistema de gestión de equipos de básquet 🏀
            </p>

        </div>
    </div>
</x-guest-layout>