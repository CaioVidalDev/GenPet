<?php

namespace App\Livewire\Guardiaos;

use App\Livewire\Forms\GuardiaoForm;
use App\Models\Guardiao;
use Livewire\Component;

class UpdateGuardiao extends Component
{
    public string $selectedTab = 'dados-pessoais';

    public GuardiaoForm $form;

    public function mount(Guardiao $guardiao)
    {
        $guardiao->refresh();
        $this->form->setGuardiao($guardiao);
    }

    public function update()
    {
        $this->form->update();
        session()->flash('guardiao-updated');
        $this->redirect('/guardiaos'); 
    }

    public function render()
    {
        return view('livewire.guardiaos.update-guardiao');
    }
}

