<?php

namespace App\Livewire\Servicos;

use App\Models\Servico;
use Livewire\Component;

class ViewServico extends Component
{

    public ?Servico $servico = null;

    public string $selectedTab = 'servico';

    public function mount(Servico $servico)
    {
        $servico->refresh();
        $this->servico = $servico;
    }
    
    public function render()
    {
        return view('livewire.servicos.view-servico');
    }
}
