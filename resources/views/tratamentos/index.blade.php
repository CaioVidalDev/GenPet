<x-app-layout>

    <div class="flex flex-col gap-9">

        <div class="">

            <div class="flex justify-between items-center px-6.5 py-4">

                <h3 class="font-bold text-xl border-b-6 border-primary text-black">
                    {{ __('Pesquisando Tratamentos') }}
                </h3>

                <x-mary-button icon="o-plus" :label="__('Adicionar')" :link="route('tratamentos.create')" class="btn-ghost"/>

            </div>

            <div class="rounded-lg border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-4">
                <livewire:tables.tratamento-table />
            </div>

        </div>
    </div>

</x-app-layout>
