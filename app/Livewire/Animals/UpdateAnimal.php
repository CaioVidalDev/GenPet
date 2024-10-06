<?php

namespace App\Livewire\Animals;

use App\Enums\Especie;
use App\Enums\Porte;
use App\Enums\Sexo;
use App\Livewire\Forms\AnimalForm;
use App\Models\Animal;
use App\Models\Guardiao;
use Livewire\Attributes\Computed;
use Livewire\Component;

class UpdateAnimal extends Component
{
    public string $selectedTab = 'animal';

    public AnimalForm $form;

    public function mount(Animal $animal)
    {
        $animal->refresh();
        $this->form->setAnimal($animal);
    }

    public function update()
    {
        $this->form->update();
        session()->flash('animal-updated');
        $this->redirect('/animals'); 
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
        return view('livewire.animals.update-animal',[
            'especie' => Especie::selectMaryUiArray(),
            'sexo' => Sexo::selectMaryUiArray(),
            'porte' => Porte::selectMaryUiArray(),
        ]);
    }
}

