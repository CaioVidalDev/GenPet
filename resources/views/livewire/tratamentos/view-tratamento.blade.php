<div class="p-8">
  
        <x-mary-tabs wire:model="selectedTab">

           <x-mary-tab name="tratamento" label="Tratamentos" icon="healthicons.f-hospitalized">
                <div class="grid grid-cols-2 gap-4">
                    
                    <x-mary-input label="Tipo" value="{{ $tratamento->tipo }}"  readonly/>

                    <x-mary-input label="Animal" value="{{ $tratamento->animal->nome }}"  readonly/>

                    <x-mary-input label="Data de tratamento" value="{{ $tratamento->data_tratamento }}"  readonly/>

                    <x-mary-input label="Produto utilizado" value="{{ $tratamento->produto_utilizado }}"  readonly/>

                    <x-mary-input label="Dosagem" value="{{ $tratamento->dosagem }}"  readonly/>

                    <x-mary-input label="Via administração" value="{{ $tratamento->via_administracao }}"  readonly/>

                    <x-mary-input label="Veterinário responsavel" value="{{ $tratamento->veterinario_responsavel }}"  readonly/>

                <div class="sm:col-span-full">
                    <x-mary-input label="Observações" value="{{ $tratamento->observacoes }}"  readonly/>
                </div>

                </div>
            
        </x-mary-tabs>

    </x-form>
</div>
