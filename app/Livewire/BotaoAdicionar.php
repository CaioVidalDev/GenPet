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
                    <x-ts-button icon="plus" wire:navigate :$href :personalize="[
                        'wrapper.class' => [
                            'append' => 'sm:hidden'
                        ]
                    ]"/>

                    <x-ts-button icon="plus" :text="__('Adicionar')" wire:navigate :$href :personalize="[
                        'wrapper.class' => [
                            'append' => 'hidden sm:flex'
                        ]
                    ]"/>
                @endif

                @if(Illuminate\Support\Str::of($component . $event)->isNotEmpty())
                    <x-ts-button icon="plus" wire:click="btnDispatch" :personalize="[
                        'wrapper.class' => [
                            'append' => 'sm:hidden'
                        ]
                    ]"/>

                    <x-ts-button icon="plus" :text="__('Adicionar')" wire:click="btnDispatch" :personalize="[
                        'wrapper.class' => [
                            'append' => 'hidden sm:flex'
                        ]
                    ]"/>
                @endif
            </div>
        HTML;
    }
}
