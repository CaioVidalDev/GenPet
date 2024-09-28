<?php

namespace App\Livewire\Animals;

use App\Models\Animal;
use Livewire\Component;

class ViewAnimal extends Component
{

    public ?Animal $animal = null;

    public string $selectedTab = 'animal';

    public function mount(Animal $animal)
    {
        $animal->refresh();
        $this->animal = $animal;
    }
    
    public function render()
    {
        return view('livewire.animals.view-animal');
    }
}
