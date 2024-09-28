<div class="p-8">
  
        <x-mary-tabs wire:model="selectedTab">

            <x-mary-tab name="dados-pessoais" label="Dados Pessoais" icon="o-users">
                <div class="grid grid-cols-3 gap-4">
                    
                    <x-mary-input label="Nome*" value="{{ $guardiao->nome }}"  readonly/>
                    
                    <x-mary-input label="Email" value="{{ $guardiao->email }}" readonly/>

                    <x-mary-input label="Telefone*" value="{{ $guardiao->telefone }}" readonly/>

                </div>
            
        </x-mary-tabs>

    </x-form>
</div>
