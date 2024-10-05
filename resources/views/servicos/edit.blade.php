<x-app-layout>

    <x-slot:title>
        Editando Serviço
    </x-slot>

    <div class="flex items-center justify-between">

        <div class="font-bold text-xl border-b-6 border-primary text-black">
            {{ __('Editando Serviço') }}
        </div>


        <x-mary-button icon="o-magnifying-glass" :label="__('Pesquisar')" :link="route('servicos.index')" class="btn-ghost"/>


    </div>
        
    <div class="rounded-lg border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-4">
        <livewire:servicos.update-servico :$servico/>
    </div>

</x-app-layout>
