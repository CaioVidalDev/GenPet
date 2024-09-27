<div>

    <form wire:submit="update">

        <x-ts-tab wire:model="selected_tab" :personalize="[
            'base.wrapper' => ['replace' => ['bg-white' => 'bg-gray-50']],
        ]">

            <x-ts-tab.items tab="Dados Pessoais">
                <div class="flex flex-col gap-4 sm:grid sm:grid-cols-4">

                    <x-ts-input label="Nome" wire:model="form.nome" :personalize="[
                        'input.color.disabled' => 'dark:bg-dark-600 bg-white',
                    ]" />

                    <x-ts-input label="Email" wire:model="form.email" :personalize="[
                        'input.color.disabled' => 'dark:bg-dark-600 bg-white',
                    ]" />

                    <x-ts-input label="Telefone" wire:model="form.telefone" x-mask:dynamic="window.phoneMask"
                        :personalize="[
                            'input.color.disabled' => 'dark:bg-dark-600 bg-white',
                        ]" />

                    <x-ts-date label="Data de nascimento" format="DD/MM/YYYY" :min-date="now()->subYears(150)" :max-date="now()"
                        wire:model="form.nascimento" :personalize="[
                            'input.color.disabled' => 'dark:bg-dark-600 bg-white',
                        ]" />

                </div>
            </x-ts-tab.items>

        </x-ts-tab>

        <div class="flex flex-col-reverse gap-4 justify-between mt-6 sm:flex-row sm:gap-0">   
            <x-ts-button icon="plus" text="Adicionar" :href="route('guardiaos.create')" />         
            <x-ts-button icon="floppy-disk-back" text="Atualizar" type="submit" loading="update" />
        </div>

    </form>
</div>
