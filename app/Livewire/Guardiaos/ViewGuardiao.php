<?php

namespace App\Livewire\Guardiaos;

use App\Models\Guardiao;
use Livewire\Component;

class ViewGuardiao extends Component
{

    public ?Guardiao $guardiao = null;

    public string $selectedTab = 'dados-pessoais';

    public function mount(Guardiao $guardiao)
    {
        $guardiao->refresh();
        $this->guardiao = $guardiao;
    }
    
    public function render()
    {
        return view('livewire.guardiaos.view-guardiao');
    }
}
