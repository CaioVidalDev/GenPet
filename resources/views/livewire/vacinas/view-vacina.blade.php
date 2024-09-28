<div class="p-8">
  
        <x-mary-tabs wire:model="selectedTab">

           <x-mary-tab name="vacina" label="Vacinas" icon="tabler.vaccine">
                <div class="grid grid-cols-2 gap-4">
                    
                    <x-mary-input label="Nome" value="{{ $vacina->nome }}"  readonly/>

                    <x-mary-input label="Animal" value="{{ $vacina->animal->nome }}"  readonly/>

                    <x-mary-input label="Laboratório" value="{{ $vacina->laboratorio }}"  readonly/>

                    <x-mary-input label="Numero do lote" value="{{ $vacina->lote }}"  readonly/>

                    <x-mary-input label="Data de aplicação" value="{{ $vacina->aplicacao }}"  readonly/>

                    <x-mary-input label="Data de revacinação" value="{{ $vacina->revacinacao }}"  readonly/>

                <div class="sm:col-span-full">
                    <x-mary-input label="Observações" value="{{ $vacina->observacoes }}"  readonly/>
                </div>

                </div>
            
        </x-mary-tabs>

    </x-form>
</div>
