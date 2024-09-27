<x-app-layout>

    <x-slot:title>
        Editando Guardião
    </x-slot>

    <div class="flex items-center justify-between">

        <div class="text-2xl font-semibold underline decoration-primary sm:text-3xl dark:text-white">
            {{ __('Editando Guardião') }}
        </div>


        <x-ts-button icon="magnifying-glass" :href="route('guardiaos.index')" wire:navigate :personalize="[
            'wrapper.class' => [
                'append' => 'sm:hidden',
            ],
        ]" />

        <x-ts-button icon="magnifying-glass" :text="__('Pesquisar')" :href="route('guardiaos.index')" wire:navigate :personalize="[
            'wrapper.class' => [
                'append' => 'hidden sm:flex',
            ],
        ]" />

    </div>
        
    <div class="mt-4">
        <livewire:guardiaos.update-guardiao :$guardiao/>
    </div>

</x-app-layout>
