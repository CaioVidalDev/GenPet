<?php

namespace App\Livewire\Animals;

use App\Enums\Especie;
use App\Enums\Porte;
use App\Enums\Sexo;
use App\Livewire\Forms\AnimalForm;
use App\Models\Guardiao;
use Livewire\Attributes\Computed;
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

    #[Computed()]
    public function guardiao()
    {
        return Guardiao::get()->map(function ($guardiao) { 
            return [ 'name' => $guardiao->nome, 'id' => $guardiao->id ]; 
        });
    }

    public function render()
    {
        return view('livewire.animals.store-animal',[
            'especie' => Especie::selectMaryUiArray(),
            'sexo' => Sexo::selectMaryUiArray(),
            'porte' => Porte::selectMaryUiArray(),
        ]);
    }
    
}
