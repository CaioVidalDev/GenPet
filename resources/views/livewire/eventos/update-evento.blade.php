@php
    $format = ['altFormat' => 'd/m/Y'];
@endphp

<div>

    <x-mary-modal title="Editando Evento" wire:model="editEventoModal">

    <x-mary-form wire:submit="update">

                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">

                   <x-mary-input 
                        class='dark:border-pg-primary-600 dark:bg-black'
                        label="{{ __('Título') }}*" 
                        wire:model="form.titulo" 
                        placeholder="Digite o título" 
                    />
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4" >
                        <x-mary-datepicker
                            class='dark:border-pg-primary-600 dark:bg-black'
                            label="Data de Início*" 
                            wire:model="form.inicio_data" 
                            placeholder="00/00/0000"
                            :config="$format"
                            icon="o-calendar"
                            type="datetime-local" 
                        />

                        <x-mary-datetime
                            class='dark:border-pg-primary-600 dark:bg-black'
                            label="Hora de Início*" 
                            wire:model="form.inicio_hora" 
                            placeholder="00:00"
                            icon="o-clock"
                            type="time" 
                        />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4" >
                        <x-mary-datepicker
                            class='dark:border-pg-primary-600 dark:bg-black'
                            label="Data do Fim*" 
                            wire:model="form.fim_data" 
                            placeholder="00/00/0000"
                            :config="$format"
                            icon="o-calendar"
                            type="datetime-local" 
                        />
                        <x-mary-datetime
                            class='dark:border-pg-primary-600 dark:bg-black'
                            label="Hora do Fim*" 
                            wire:model="form.fim_hora" 
                            placeholder="00:00"
                            icon="o-clock"
                            type="time" 
                        />
                    </div>

                    <x-mary-textarea 
                        class='dark:border-pg-primary-600 dark:bg-black'
                        label="{{ __('Observações') }}" 
                        wire:model="form.observacoes" 
                    />

                </div>         

        <div class="flex flex-col-reverse gap-4 justify-between mt-6 sm:flex-row sm:gap-0">  

           <x-mary-button label="Excluir" spinner="confirmDelete" wire:click="confirmDelete" />
            <x-mary-button label="Atualizar" class="btn-primary" type="submit" spinner="update" />

        </div>
    </x-mary-form>

    </x-mary-modal>

     <x-mary-modal title="Confirmação de Exclusão" wire:model="confirmDeleteModal">
        <div class="text-center">
            <p>Tem certeza de que deseja excluir este evento?</p>
        </div>
        <div class="flex justify-center mt-4 gap-4">
            
            <x-mary-button label="Sim" class="btn-danger" wire:click="deleteEvento" />
            <x-mary-button label="Não" wire:click="$set('confirmDeleteModal', false)" />

        </div>
    </x-mary-modal>
</div>
