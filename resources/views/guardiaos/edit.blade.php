<x-app-layout>

    <x-slot:title>
        Editando Guardião
    </x-slot>

    <div class="flex items-center justify-between">

        <div class="font-bold text-xl border-b-6 border-primary text-black">
            {{ __('Editando Guardião') }}
        </div>


        <x-mary-button icon="o-magnifying-glass" :label="__('Pesquisar')" :link="route('guardiaos.index')" class="btn-ghost"/>


    </div>
        
    <div class="mt-4">
        <livewire:guardiaos.update-guardiao :$guardiao/>
    </div>

</x-app-layout>
