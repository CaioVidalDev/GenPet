<div class="p-8">
    <x-mary-form wire:submit="save">


        <x-mary-tabs wire:model="selectedTab">

            <x-mary-tab name="servico" label="Serviços" icon="ri.scissors-2-fill">
                <div class="grid grid-cols-2 gap-4">
                    
                    <x-mary-input label="{{ __('Nome') }}*" wire:model="form.nome" placeholder="Digte o nome" />

                    <x-mary-select label="Animal*" wire:model="form.animal_id" placeholder="Selecione um animal" :options="$this->animal" select="name:label|id:value" searchable/>

                    <x-mary-input label="Valor" wire:model="form.valor" prefix="R$" placeholder="0.00"
                        x-mask:dynamic="$money($input, '.')" />

                    <x-mary-input label="local" wire:model="form.local" placeholder="Digite o local" />

                    <x-mary-input label="Data do serviço*" wire:model="form.data" x-mask="99/99/9999" placeholder="MM/DD/YYYY" :min-date="now()->subYears(150)" :max-date="now()" />

                <div class="sm:col-span-full">
                    <x-mary-textarea label="Descrição" wire:model="form.descricao" placeholder="" />
                </div>

                </div>
            </x-mary-tab>

        </x-mary-tabs>

        <x-slot:actions>
            <x-mary-button label="Limpar" wire:click="form_reset"/>
            <x-mary-button label="Salvar" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>


    </x-form>
</div>
