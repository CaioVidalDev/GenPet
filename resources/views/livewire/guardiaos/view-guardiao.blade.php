<div>

    <x-ts-tab selected="Dados Pessoais" :personalize="[
        'base.wrapper' => ['replace' => ['bg-white' => 'bg-gray-50']],
    ]">

        <x-ts-tab.items tab="Dados Pessoais">
            <div class="flex flex-col gap-4 sm:grid sm:grid-cols-4">

                <x-ts-input label="Nome" :value="$aluno->user->name" readonly :personalize="[
                    'input.color.disabled' => 'dark:bg-dark-600 bg-white',
                ]" />

                <x-ts-input label="Email" :value="$aluno->user->email" readonly :personalize="[
                    'input.color.disabled' => 'dark:bg-dark-600 bg-white',
                ]" />

                <x-ts-input label="Telefone" :value="$aluno->telefone?->formatNational()" readonly :personalize="[
                    'input.color.disabled' => 'dark:bg-dark-600 bg-white',
                ]" />

                <x-ts-input label="Data de nascimento" :value="$aluno->nascimento?->format('d/m/Y')" readonly :personalize="[
                    'input.color.disabled' => 'dark:bg-dark-600 bg-white',
                ]" />

            </div>
        </x-ts-tab.items>

    </x-ts-tab>

    <x-ts-button icon="pencil" :text="__('Editar')" :href="route('guardiaos.edit', ['guardiao' => $guardiao->id])" wire:navigate :personalize="[
        'wrapper.class' => [
            'append' => 'mt-4 w-full sm:hidden',
        ],
    ]" />

    <x-ts-button icon="plus" :text="__('Adicionar')" :href="route('guardiaos.create')" wire:navigate :personalize="[
        'wrapper.class' => [
            'append' => 'mt-4 w-full sm:hidden',
        ],
    ]" />

    <div class="hidden sm:flex sm:justify-end sm:mt-4 sm:gap-2">
        <x-ts-button icon="plus" :text="__('Adicionar')" :href="route('guardiaos.create')" wire:navigate />
        <x-ts-button icon="pencil" :text="__('Editar')" :href="route('guardiaos.edit', ['aluno' =>  $guardiao->id])" wire:navigate />
    </div>

</div>

