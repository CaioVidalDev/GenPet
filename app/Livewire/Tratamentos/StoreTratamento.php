<?php

namespace App\Livewire\Tratamentos;

use App\Enums\Via;
use App\Livewire\Forms\TratamentoForm;
use App\Models\Animal;
use Livewire\Component;
use Livewire\Attributes\Computed;

class StoreTratamento extends Component
{
    public string $selectedTab = 'tratamento';

    public TratamentoForm $form;

    public function save() 
    {
        $tratamento = $this->form->store();

        $this->dispatch('tratamento-created'); 

        $this->form->reset();
    }

    public function form_reset() 
    {
        $this->form->reset();
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
        return view('livewire.tratamentos.store-tratamento',[
            'via_administracao' => Via::selectMaryUiArray(),
        ]);
    }
    
}
