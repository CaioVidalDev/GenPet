<?php

namespace App\Livewire\Guardiaos;

use App\Livewire\Forms\GuardiaoForm;
use Livewire\Component;

class StoreGuardiao extends Component
{
    public string $selectedTab = 'dados-pessoais';

    public GuardiaoForm $form;

    public function save() 
    {
        $guardiao = $this->form->store();

        $this->dispatch('guardiao-created'); 

        $this->form->reset();
    }

    public function form_reset() 
    {
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.guardiaos.store-guardiao');
    }
    
}
