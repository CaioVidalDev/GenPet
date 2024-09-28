<x-app-layout>

    <x-slot:title>
        Cadastrar Guardião
    </x-slot>

    <div class="flex items-center justify-between">

        <div class="font-bold text-xl border-b-6 border-primary text-black">
            {{ __('Cadastro de Guardiões') }}
        </div>


          <x-mary-button icon="o-magnifying-glass" :label="__('Pesquisar')" :link="route('guardiaos.index')" class="btn-ghost"/>

    </div>
    
    

    <div class="rounded-lg border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-4">
     <x-mary-alert x-data="{ show: false }" x-on:guardiao-created.window="show = true" title="Guardião cadastrado com sucesso" description="Guardião está disponível para ser associado a outros registros" icon="o-check-circle" class="alert-success" dismissible shadow />

        <livewire:guardiaos.store-guardiao />
    </div>

</x-app-layout>
