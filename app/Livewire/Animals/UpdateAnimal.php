<?php

namespace App\Livewire\Animals;

use App\Enums\Porte;
use App\Enums\Sexo;
use App\Livewire\Forms\AnimalForm;
use App\Models\Animal;
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

    public function render()
    {
        return view('livewire.animals.update-animal',[
            'sexo' => Sexo::selectMaryUiArray(),
            'porte' => Porte::selectMaryUiArray(),
        ]);
    }
}

