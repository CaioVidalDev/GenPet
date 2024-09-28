<?php

namespace App\Livewire\Vacinas;

use App\Livewire\Forms\VacinaForm;
use App\Models\Animal;
use Livewire\Component;
use Livewire\Attributes\Computed;

class StoreVacina extends Component
{
    public string $selectedTab = 'vacina';

    public VacinaForm $form;

    public function save() 
    {
        $vacina = $this->form->store();

        $this->dispatch('vacina-created'); 

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
        return view('livewire.vacinas.store-vacina');
    }
    
}
