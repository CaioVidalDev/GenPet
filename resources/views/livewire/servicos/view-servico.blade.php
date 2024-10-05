<div class="p-8">
  
        <x-mary-tabs wire:model="selectedTab">

           <x-mary-tab name="servico" label="Serviços" icon="ri.scissors-2-fill">
                <div class="grid grid-cols-2 gap-4">
                    
                    <x-mary-input label="Nome" value="{{ $servico->nome }}"  readonly/>

                    <x-mary-input label="Animal" value="{{ $servico->animal->nome }}"  readonly/>

                    <x-mary-input label="Valor" value="{{ $servico->valor }}"  readonly/>

                    <x-mary-input label="Local" value="{{ $servico->local }}"  readonly/>

                    <x-mary-input label="Data do serviço" value="{{ $servico->data }}"  readonly/>

                <div class="sm:col-span-full">
                    <x-mary-input label="Descrição" value="{{ $servico->descricao }}"  readonly/>
                </div>

                </div>
            
        </x-mary-tabs>

    </x-form>
</div>
