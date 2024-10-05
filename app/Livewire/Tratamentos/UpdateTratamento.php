<?php

namespace App\Livewire\Tratamentos;

use App\Enums\Via;
use App\Livewire\Forms\TratamentoForm;
use App\Models\Animal;
use App\Models\Tratamento;
use Livewire\Component;
use Livewire\Attributes\Computed;

class UpdateTratamento extends Component
{
    public string $selectedTab = 'tratamento';

    public TratamentoForm $form;

    public function mount(Tratamento $tratamento)
    {
        $tratamento->refresh();
        $this->form->setTratamento($tratamento);
    }

    public function update()
    {
        $this->form->update();
        session()->flash('tratamento-updated');
        $this->redirect('/tratamentos'); 
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
        return view('livewire.tratamentos.update-tratamento',[
            'via_administracao' => Via::selectMaryUiArray(),
        ]);
    }
}

