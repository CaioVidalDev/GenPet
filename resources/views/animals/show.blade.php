<x-app-layout>

    <x-slot:title>
        Visualizando Animal
    </x-slot>

    <div class="flex items-center justify-between">
            
        <div class="text-2xl font-semibold underline decoration-primary sm:text-3xl dark:text-white">
            {{ __('Visualizando Animal') }}
        </div>


       <x-mary-button icon="o-magnifying-glass" :label="__('Pesquisar')" :link="route('animals.index')" class="btn-ghost"/>


    </div>
    

    <div class="mt-8">

        <livewire:animals.view-animal :$animal />

    </div>

</x-app-layout>
