<x-app-layout>

    <x-slot:title>
        Visualizando Vacina
    </x-slot>

    <div class="flex items-center justify-between">
            
        <div class="font-bold text-xl border-b-6 border-primary text-black">
            {{ __('Visualizando Vacina') }}
        </div>


       <x-mary-button icon="o-magnifying-glass" :label="__('Pesquisar')" :link="route('vacinas.index')" class="btn-ghost"/>


    </div>
    

    <div class="mt-8">

        <livewire:vacinas.view-vacina :$vacina />

    </div>

</x-app-layout>
