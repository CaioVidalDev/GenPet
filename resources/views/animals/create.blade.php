<x-app-layout>

    <x-slot:title>
        Cadastrar Animal
    </x-slot>

    <div class="flex items-center justify-between">

        <div class="font-bold text-xl border-b-6 border-primary text-black">
            {{ __('Cadastro de Animais') }}
        </div>


          <x-mary-button icon="o-magnifying-glass" :label="__('Pesquisar')" :link="route('animals.index')" class="btn-ghost"/>

    </div>
    
    

    <div class="rounded-lg border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-4">
     <x-mary-alert x-data="{ show: false }" x-on:animal-created.window="show = true" title="Animal cadastrado com sucesso!" description="Animal está disponível para ser associado a outros registros." icon="o-check-circle" class="alert-success" dismissible shadow />

        <livewire:animals.store-animal />
    </div>

</x-app-layout>
