<x-app-layout>

    <div class="flex flex-col gap-9">

        <div class="">

            <div class="flex justify-between items-center px-6.5 py-4">

                <h3 class="font-bold text-xl border-b-6 border-primary text-black">
                    {{ __('Pesquisando Animais') }}
                </h3>

                <x-mary-button icon="o-plus" :label="__('Adicionar')" :link="route('animals.create')" class="btn-ghost"/>

            </div>

            <div class="rounded-lg border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-4">

                @if (session('animal-updated'))
                    <div id="alert-success" class="my-4">
                        <x-mary-alert icon="o-check-circle" title="Animal atualizado com sucesso!"
                            description="Os dados do animal foram atualizados com sucesso." class="alert-success" close />
                    </div>
                @endif

                <livewire:tables.animal-table />
            </div>

        </div>
    </div>

</x-app-layout>
