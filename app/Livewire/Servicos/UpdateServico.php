<?php

namespace App\Livewire\Servicos;

use App\Livewire\Forms\ServicoForm;
use App\Models\Animal;
use App\Models\Servico;
use Livewire\Component;
use Livewire\Attributes\Computed;

class UpdateServico extends Component
{
    public string $selectedTab = 'servico';

    public ServicoForm $form;

    public function mount(Servico $servico)
    {
        $servico->refresh();
        $this->form->setServico($servico);
    }

    public function update()
    {
        $this->form->update();
        $this->redirect('/servicos'); 
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
        return view('livewire.servicos.update-servico');
    }
}

