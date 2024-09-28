<?php

namespace App\Livewire\Animals;

use App\Enums\Porte;
use App\Enums\Sexo;
use App\Livewire\Forms\AnimalForm;
use Livewire\Component;

class StoreAnimal extends Component
{
    public string $selectedTab = 'animal';

    public AnimalForm $form;

    public function save() 
    {
        $animal = $this->form->store();

        $this->dispatch('animal-created'); 

        $this->form->reset();
    }

    public function form_reset() 
    {
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.animals.store-animal',[
            'sexo' => Sexo::selectMaryUiArray(),
            'porte' => Porte::selectMaryUiArray(),
        ]);
    }
    
}
