<?php

namespace App\Livewire\Vacinas;

use App\Models\Vacina;
use Livewire\Component;

class ViewVacina extends Component
{

    public ?Vacina $vacina = null;

    public string $selectedTab = 'vacina';

    public function mount(Vacina $vacina)
    {
        $vacina->refresh();
        $this->vacina = $vacina;
    }
    
    public function render()
    {
        return view('livewire.vacinas.view-vacina');
    }
}
