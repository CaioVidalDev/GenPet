<?php

namespace App\Livewire\Servicos;

use App\Livewire\Forms\ServicoForm;
use App\Models\Animal;
use Livewire\Component;
use Livewire\Attributes\Computed;

class StoreServico extends Component
{
    public string $selectedTab = 'servico';

    public ServicoForm $form;

    public function save() 
    {
        $servico = $this->form->store();

        $this->dispatch('servico-created'); 

        $this->form->reset();
    }

    public function form_reset() 
    {
        $this->form->reset();
    }

    #[Computed]
    public function animal()
    {
        return Animal::get()->map(function ($animal) { 
            return [ 'name' => $animal->nome, 'id' => $animal->id ]; 
        });
    }

    public function render()
    {
        return view('livewire.servicos.store-servico');
    }
    
}
