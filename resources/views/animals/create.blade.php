<x-app-layout>

    <x-slot:title>
        Cadastrar Animal
    </x-slot>

    <div class="flex items-center justify-between">

        <div class="font-bold text-xl border-b-6 border-primary text-black">
            {{ __('Cadastrar Animal') }}
        </div>


          <x-mary-button icon="o-magnifying-glass" :label="__('Pesquisar')" :link="route('animals.index')" class="btn-ghost"/>

    </div>
    
    

    <div class="mt-4">
        <livewire:animals.store-animal />
    </div>

</x-app-layout>
