<x-app-layout>

    <x-slot:title>
        Cadastrar Guardião
    </x-slot>

    <div class="flex items-center justify-between">

        <div class="text-2xl font-semibold underline decoration-primary sm:text-3xl dark:text-white">
            {{ __('Cadastrar Guardião') }}
        </div>


          <x-mary-button icon="o-magnifying-glass" :label="__('Pesquisar')" :link="route('guardiaos.index')" class="btn-ghost"/>

    </div>
    
    

    <div class="mt-4">
        <livewire:guardiaos.store-guardiao />
    </div>

</x-app-layout>
