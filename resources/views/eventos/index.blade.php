<x-app-layout>

    <div class="flex flex-col gap-9">

        <div class="">

            <div class="flex justify-between items-center px-6.5 py-4">

                <h3 class="font-bold text-xl border-b-6 border-primary text-black">
                    {{ __('Agenda') }}
                </h3>

              <livewire:botao-adicionar :component="App\Livewire\Eventos\StoreEvento::class" event="create-evento" />

            </div>

            <div class="rounded-lg border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-4">

                @if (session('evento-created'))
                <div id="alert-success" class="my-4">
                    <x-mary-alert title="Evento salvo com sucesso" description="Os dados de evento foram cadastrados com sucesso" icon="o-check-circle" class="alert-success" dismissible shadow />
                </div>
            @endif

            <livewire:eventos.store-evento />

            <livewire:eventos.update-evento />
            
            <div class="dark:border-pg-primary-600 dark:bg-pg-primary-800 rounded-lg border border-stroke bg-white shadow-default p-4">

                  <livewire:calendars.calendario/>
            </div>

        </div>
    </div>

</x-app-layout>
