<div class="p-8">
    <x-mary-form wire:submit="update">


        <x-mary-tabs wire:model="selectedTab">

            <x-mary-tab name="tratamento" label="Tratamentos" icon="healthicons.f-hospitalized">
                <div class="grid grid-cols-2 gap-4">
                    
                    <x-mary-input label="{{ __('Tipo') }}*" wire:model="form.tipo" placeholder="Digte o tipo" />

                    <x-mary-select label="Animal*" wire:model="form.animal_id" placeholder="Selecione um animal" :options="$this->animal" select="name:label|id:value" searchable/>

                    <x-mary-input label="Data de tratamento*" wire:model="form.data_tratamento" x-mask="99/99/9999" placeholder="MM/DD/YYYY" :min-date="now()->subYears(150)" :max-date="now()" />

                    <x-mary-input label="Produto utilizado*" wire:model="form.produto_utilizado" placeholder="Digite o produto utilizado" />

                    <x-mary-input label="Dosagem*" wire:model="form.dosagem" placeholder="Digite a dosagem" />

                    <x-mary-select label="Via administração*" wire:model="form.via_administracao" placeholder="Selecione uma via administração" :options="$via_administracao" />

                    <x-mary-input label="Veterinário responsavel*" wire:model="form.veterinario_responsavel" placeholder="Digite o veterinário responsavel" />

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
