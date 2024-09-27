<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-base-300">
        <form method="POST" action="{{ route('register') }}" class="bg-base-100 p-8 rounded-lg shadow-lg w-full max-w-md">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" class="text-black" />
                <x-text-input id="name" class="block mt-1 w-full input input-bordered text-base-content" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-error-content" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-black" />
                <x-text-input id="email" class="block mt-1 w-full input input-bordered text-base-content" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-error-content" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-black" />
                <x-text-input id="password" class="block mt-1 w-full input input-bordered text-base-content" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-error-content" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-black" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full input input-bordered text-base-content" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-error-content" />
            </div>

             <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="link link-primary text-sm block" href="{{ route('login') }}">
                    {{ __('Ja cadastrado?') }}
                </a>

                @endif
                

                <x-primary-button class="btn btn-primary">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
