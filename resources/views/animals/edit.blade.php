<x-app-layout>

    <x-slot:title>
        Editando Animal
    </x-slot>

    <div class="flex items-center justify-between">

        <div class="text-2xl font-semibold underline decoration-primary sm:text-3xl dark:text-white">
            {{ __('Editando Animal') }}
        </div>


        <x-mary-button icon="o-magnifying-glass" :label="__('Pesquisar')" :link="route('animals.index')" class="btn-ghost"/>


    </div>
        
    <div class="mt-4">
        <livewire:animals.update-animal :$animal/>
    </div>

</x-app-layout>
