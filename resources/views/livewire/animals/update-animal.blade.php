<div class="p-8">
    <x-mary-form wire:submit="update">


        <x-mary-tabs wire:model="selectedTab">

            <x-mary-tab name="animal" label="Animais" icon="fas.dog">
                <div class="grid grid-cols-2 gap-4">
                    
                    <x-mary-input label="{{ __('Nome') }}*" wire:model="form.nome" placeholder="Digte o nome do animal" />

                    <x-mary-input label="Data de Nascimento*" wire:model="form.nascimento" x-mask="99/99/9999" placeholder="MM/DD/YYYY" :min-date="now()->subYears(150)" :max-date="now()" />

                    <x-mary-input label="Espécie*" wire:model="form.especie" placeholder="" />

                    <x-mary-select label="Porte*" wire:model="form.porte" placeholder="" :options="$porte" />

                    <x-mary-input label="Raça*" wire:model="form.raca" placeholder="" />

                    <x-mary-input label="Pelagem*" wire:model="form.pelagem" placeholder="" />

                    <x-mary-select label="Sexo*" wire:model="form.sexo" placeholder="" :options="$sexo" />

                    <x-mary-input label="Microship" wire:model="form.microship" placeholder="" />

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
