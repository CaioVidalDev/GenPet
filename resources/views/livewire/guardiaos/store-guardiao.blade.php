<div class="p-8">
    <x-mary-form wire:submit="save">


        <x-mary-tabs wire:model="selectedTab">

            <x-mary-tab name="dados-pessoais" label="Dados Pessoais" icon="o-users">
                <div class="grid grid-cols-3 gap-4">
                    
                    <x-mary-input label="{{ __('Nome') }}*" wire:model="form.nome" placeholder="Digte o nome do cliente" />

                    <x-mary-input label="Email" wire:model="form.email" placeholder="Digte o email" />

                    <x-mary-input label="Telefone*" wire:model="form.telefone" placeholder="Digte seu telefone" x-mask="99 99999 9999"/>

                </div>
            </x-mary-tab>

        </x-mary-tabs>

        <x-slot:actions>
            <x-mary-button label="Limpar" wire:click="form_reset"/>
            <x-mary-button label="Salvar" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>


    </x-form>
</div>
