<x-app-layout>

    <x-slot:title>
        Visualizando Tratamento
    </x-slot>

    <div class="flex items-center justify-between">
            
        <div class="font-bold text-xl border-b-6 border-primary text-black">
            {{ __('Visualizando Tratamento') }}
        </div>


       <x-mary-button icon="o-magnifying-glass" :label="__('Pesquisar')" :link="route('tratamentos.index')" class="btn-ghost"/>


    </div>
    

    <div class="rounded-lg border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-4">

        <livewire:tratamentos.view-tratamento :$tratamento />

    </div>

</x-app-layout>
