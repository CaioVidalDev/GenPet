<x-app-layout>

    <x-slot:title>
        Editando Vacina
    </x-slot>

    <div class="flex items-center justify-between">

        <div class="font-bold text-xl border-b-6 border-primary text-black">
            {{ __('Editando Vacina') }}
        </div>


        <x-mary-button icon="o-magnifying-glass" :label="__('Pesquisar')" :link="route('vacinas.index')" class="btn-ghost"/>


    </div>
        
    <div class="rounded-lg border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-4">
        <livewire:vacinas.update-vacina :$vacina/>
    </div>

</x-app-layout>
