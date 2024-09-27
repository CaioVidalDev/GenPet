<div class="p-8">
    <x-mary-form wire:submit="save">


        <x-mary-tabs wire:model="selectedTab">

            <x-mary-tab name="dados-pessoais" label="Dados Pessoais" icon="o-users">
                <div class="grid grid-cols-3 gap-4">
                    
                    <x-mary-input label="CPF/CNPJ*" wire:model="form.cpf_cnpj" 
                    x-on:change="$wire.searchPessoa()"
                    x-mask:dynamic="($input.replace(/\D/g,'')).length <= 11 ? '999.999.999-999' : '99.999.999/9999-99'"
                    placeholder="Digte o CPF ou CNPJ"/>
                    
                    <x-mary-input label="{{ __('Nome') }}*" wire:model="form.nome" placeholder="Digte o nome do cliente" />

                    <x-mary-input label="Email" wire:model="form.email" placeholder="Digte o email" />

                    
                    <div wire:loading wire:target="searchPessoa">Procurando pessoa...</div>
                    

                </div>
            </x-mary-tab>

            <x-mary-tab name="dados-pessoa-fisica" label="Dados Física" icon="o-user-circle">
                <div>
                    
                </div>
            </x-mary-tab>

            <x-mary-tab name="dados-pessoa-juridica" label="Dados Júridica" icon="c-building-office-2">
                <div>
                    
                </div>
            </x-mary-tab>

            <x-mary-tab name="dados-contatos" label="Contatos" icon="o-phone">
                <div>
                    
                </div>
            </x-mary-tab>

        </x-mary-tabs>

        
        
        <x-slot:actions>
            <x-mary-button label="Limpar" wire:click="form_reset"/>
            <x-mary-button label="Salvar" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>


    </x-form>
</div>
