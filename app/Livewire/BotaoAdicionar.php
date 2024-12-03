<?php

namespace App\Livewire;

use Livewire\Component;

class BotaoAdicionar extends Component
{

    public $component;
    public $event = '';
    public $href = '';

    public function mount($component, $event = '', $href = '')
    {
        $this->component = $component;
        $this->event = $event;
        $this->href = $href;
    }

    public function btnDispatch()
    {
        $this->dispatch($this->event)->to($this->component);
    }

    public function render()
    {
        return <<<'HTML'
            <div>

                @if(Illuminate\Support\Str::of($href)->isNotEmpty())
                    <x-mary-button icon="fas.plus" wire:navigate :$href />

                    <x-mary-button icon="fas.plus" :text="__('Adicionar')" wire:navigate :$href 
                @endif

                @if(Illuminate\Support\Str::of($component . $event)->isNotEmpty())
                    <x-mary-button icon="fas.plus" wire:click="btnDispatch" />

                    <x-mary-button icon="fas.plus" :text="__('Adicionar')" wire:click="btnDispatch" />
                @endif
            </div>
        HTML;
    }
}
