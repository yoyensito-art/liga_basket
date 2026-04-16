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
                Inicia sesión para gestionar equipos
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email"
                        class="block mt-1 w-full rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autofocus autocomplete="username" />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password"
                        class="block mt-1 w-full rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember -->
                <div class="block mt-4">
                    <label class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-orange-500 shadow-sm focus:ring-orange-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">Recordarme</span>
                    </label>
                </div>

                <!-- Botones -->
                <div class="flex items-center justify-between mt-6">

                    @if (Route::has('password.request'))
                        <a class="text-sm text-orange-600 hover:underline"
                           href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif

                    <x-primary-button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg shadow-lg">
                        Iniciar Sesión
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