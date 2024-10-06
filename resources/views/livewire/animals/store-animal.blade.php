<div class="p-8">
    <x-mary-form wire:submit="save">


        <x-mary-tabs wire:model="selectedTab">

            <x-mary-tab name="animal" label="Animais" icon="fas.dog">
                <div class="grid grid-cols-2 gap-4">
                    
                    <x-mary-input label="{{ __('Nome') }}*" wire:model="form.nome" placeholder="Digte o nome" />

                    <x-mary-select label="Guardião*" wire:model="form.guardiao_id" placeholder="Selecione um guardião" :options="$this->guardiao" select="name:label|id:value" searchable/>

                    <x-mary-input label="Data de Nascimento*" wire:model="form.nascimento" x-mask="99/99/9999" placeholder="MM/DD/YYYY" :min-date="now()->subYears(150)" :max-date="now()" />

                    <x-mary-select label="Espécie*" wire:model="form.especie" placeholder="Digite a espécie" :options="$especie" />

                    <x-mary-input label="Raça*" wire:model="form.raca" placeholder="Digite a raça" />

                    <x-mary-input label="Pelagem*" wire:model="form.pelagem" placeholder="Digite a Pelagem" />

                    <x-mary-select label="Porte*" wire:model="form.porte" placeholder="Selecione um porte" :options="$porte" />

                    <x-mary-select label="Sexo*" wire:model="form.sexo" placeholder="Selecione um sexo" :options="$sexo" />

                    <x-mary-input label="Microship" wire:model="form.microship" placeholder="Digite o microship" />

                <div class="sm:col-span-full">
                    <x-mary-textarea label="Observações" wire:model="form.observacoes" placeholder="" />
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
