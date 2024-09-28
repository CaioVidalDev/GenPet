<div class="p-8">
  
        <x-mary-tabs wire:model="selectedTab">

           <x-mary-tab name="animal" label="Animais" icon="fas.dog">
                <div class="grid grid-cols-2 gap-4">
                    
                    <x-mary-input label="Nome" value="{{ $animal->nome }}"  readonly/>

                    <x-mary-input label="Data de Nascimento" value="{{ $animal->nascimento }}"  readonly/>

                    <x-mary-input label="Especie" value="{{ $animal->especie }}"  readonly/>

                    <x-mary-input label="Porte" value="{{ $animal->porte }}"  readonly/>

                    <x-mary-input label="Raça" value="{{ $animal->raca }}"  readonly/>

                    <x-mary-input label="Pelagem" value="{{ $animal->pelagem }}"  readonly/>

                    <x-mary-input label="Sexo" value="{{ $animal->sexo }}"  readonly/>
                    
                    <x-mary-input label="Microship" value="{{ $animal->microship }}"  readonly/>

                <div class="sm:col-span-full">
                    <x-mary-input label="Observações" value="{{ $animal->observacoes }}"  readonly/>
                </div>

                </div>
            
        </x-mary-tabs>

    </x-form>
</div>
