<?php

namespace App\Livewire\Vacinas;

use App\Livewire\Forms\VacinaForm;
use App\Models\Animal;
use App\Models\Vacina;
use Livewire\Component;
use Livewire\Attributes\Computed;

class UpdateVacina extends Component
{
    public string $selectedTab = 'vacina';

    public VacinaForm $form;

    public function mount(Vacina $vacina)
    {
        $vacina->refresh();
        $this->form->setVacina($vacina);
    }

    public function update()
    {
        $this->form->update();
        $this->redirect('/vacinas'); 
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
        return view('livewire.vacinas.update-vacina');
    }
}

