<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex items-center justify-center min-h-screen bg-base-300">
        <form method="POST" action="{{ route('login') }}" class="bg-base-100 p-8 rounded-lg shadow-lg w-full max-w-md">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-black" />
                <x-text-input id="email" class="block mt-1 w-full input input-bordered text-base-content" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-error-content" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Senha')" class="text-black" />
                <x-text-input id="password" class="block mt-1 w-full input input-bordered text-base-content" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-error-content" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="checkbox checkbox-primary rounded" name="remember">
                    <span class="ml-2 text-sm text-base-content">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="link link-primary text-sm" href="{{ route('register') }}">
                        {{ __('Cadastra-se') }}
                    </a>

                @endif
                

                <x-primary-button class="ml-3 btn btn-primary">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
