<div class="p-8">
    <x-mary-form wire:submit="update">


        <x-mary-tabs wire:model="selectedTab">

            <x-mary-tab name="vacina" label="Vacinas" icon="tabler.vaccine">
                <div class="grid grid-cols-2 gap-4">
                    
                    <x-mary-input label="{{ __('Nome') }}*" wire:model="form.nome" placeholder="Digte o nome" />

                    <x-mary-select label="Animal*" wire:model="form.animal_id" placeholder="Selecione um animal" :options="$this->animal" select="name:label|id:value" searchable/>

                    <x-mary-input label="Laboratório*" wire:model="form.laboratorio" placeholder="Digite o laboratório" />

                    <x-mary-input label="Número do lote*" wire:model="form.lote" placeholder="Digite o número do lote" />

                    <x-mary-input label="Data de aplicação*" wire:model="form.aplicacao" x-mask="99/99/9999" placeholder="MM/DD/YYYY" :min-date="now()->subYears(150)" :max-date="now()" />

                    <x-mary-input label="Data de revacinação*" wire:model="form.revacinacao" x-mask="99/99/9999" placeholder="MM/DD/YYYY" :min-date="now()->subYears(150)" :max-date="now()" />

                <div class="sm:col-span-full">
                    <x-mary-textarea label="Observações" wire:model="form.observacoes" placeholder="" />
                </div>

                </div>
            </x-mary-tab>


        </x-mary-tabs>

        <x-slot:actions>
            <x-mary-button label="Atualizar" class="btn-primary" type="submit" spinner="update" />
        </x-slot:actions>


    </x-form>
</div>
