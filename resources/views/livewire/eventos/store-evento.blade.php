@php
    $format = ['altFormat' => 'd/m/Y'];
@endphp

<div>
        <div class="my-4">
            <x-mary-alert x-data="{ show: false }" x-on:evento-created.window="show = true" title="Evento cadastrado com sucesso!" description="O evento está disponível para ser associado a outros registros" icon="o-check-circle" class="alert-success" dismissible shadow />
        </div>
            
    <x-mary-modal title="Novo Evento" wire:model="createEventoModal" x-on:close="$wire.form_reset()">

    <x-mary-form wire:submit="save">

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
                            icon="o-calendar"
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
                            icon="o-calendar"
                            type="time" 
                        />
                    </div>

                    <x-mary-textarea 
                        class='dark:border-pg-primary-600 dark:bg-black'
                        label="{{ __('Observações') }}" 
                        wire:model="form.observacoes" 
                    />

                </div>         

        <div class='border-t-2 dark:border-pg-primary-600 flex justify-end p-2 gap-2'>
            <x-mary-button label="Limpar" wire:click="form_reset"/>
            <x-mary-button label="Salvar" class="btn-primary" type="submit" spinner="save" />
        </div>
    </x-mary-form>

    </x-mary-modal>
</div>
