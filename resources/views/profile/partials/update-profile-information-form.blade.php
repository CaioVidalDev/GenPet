<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informações do Perfil') }}
        </h2>
    </header>

    <!-- Nome -->
    <div class="">
        <x-input-label for="name" :value="__('Nome')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" autocomplete="name" readonly />
    </div>

    <!-- Email -->
    <div class="">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" readonly />
    </div>
</section>
