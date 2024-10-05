<?php

namespace App\Livewire\Tratamentos;

use App\Models\Tratamento;
use Livewire\Component;

class ViewTratamento extends Component
{

    public ?Tratamento $tratamento = null;

    public string $selectedTab = 'tratamento';

    public function mount(Tratamento $tratamento)
    {
        $tratamento->refresh();
        $this->tratamento = $tratamento;
    }
    
    public function render()
    {
        return view('livewire.tratamentos.view-tratamento');
    }
}
