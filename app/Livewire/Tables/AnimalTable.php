<?php

namespace App\Livewire\Tables;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use Mary\Traits\Toast;

final class AnimalTable extends PowerGridComponent
{
    use WithExport, Toast;

    public string $sortDirection = 'desc';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()->showSoftDeletes(showMessage: true),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
                
        ];
    }

    public function datasource(): Builder
    {
        return Animal::query()
            ->join('guardiaos', 'animals.guardiao_id', '=', 'guardiaos.id')
            ->select('animals.*', 'guardiaos.nome as guardiao_nome');
    }

    public function relationSearch(): array
    {
        return [
            'guardiao' => ['nome']
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('guardiao_nome')
            ->add('especie_formatted', fn ($animal) => trans($animal->especie->label()));

    }

    public function columns(): array
    {
        return [
            Column::make('Nome', 'nome')->searchable()->sortable(),
            Column::make('Espécie', 'especie_formatted')->searchable()->sortable(),
            Column::make('Raça', 'raca')->searchable()->sortable(),
            Column::make('Guardião', 'guardiao_nome')->searchable()->sortable(),

            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('view')]
    public function view($animalId): void
    {
        $this->redirect("animals/$animalId", navigate: true);
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($animalId): void
    {
        $this->redirect("animals/$animalId/edit", navigate: true);
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($animalId): void
    {
        Animal::destroy($animalId);

        $this->success(
            title: 'Animal excluído!',
            description: 'O Animal foi excluído com sucesso.',
        );
    }

    #[\Livewire\Attributes\On('delete-multiple')]
    public function deleteMultiple(): void
    {
        $checkedValues = $this->checkboxValues;

        if (count($checkedValues) === 0) {
            $this->warning(
                title: 'Nenhum animal selecionado!',
                description: 'Nenhum animal foi selecionado',
            );
        } else {
            $animalsIds = array_values($checkedValues);

            Animal::destroy($animalsIds);

            $this->success(
                title: 'Animais excluídos!',
                description: 'Os animais foram excluídos com sucesso.',
            );
        }
    }

    #[\Livewire\Attributes\On('restore')]
    public function restore($animalId): void
    {
        Animal::withTrashed()->find($animalId)->restore();

            $this->success(
                title: 'Animal restaurado!',
                description: 'O animal foi restaurado com sucesso.',
            );
    }

    #[\Livewire\Attributes\On('force-delete')]
    public function forceDelete($animalId): void
    {
        Animal::withTrashed()->find($animalId)->forceDelete();

            $this->success(
                title: 'Animal excluído permanentemente!',
                description: 'O animal foi excluído permanentemente.',
            );
    }

    public function header(): array
    {
        return [
            Button::add('delete')
                ->slot('Excluir múltiplos')
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('delete-multiple', [])
        ];
    }

    public function actions(Animal $row): array
    {

        if ($row->trashed()) {
          
            $acoes[] = Button::add('restore')
                ->slot('Restaurar')
                ->tooltip('Restaurar animal excluído ao sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('restore', ['animalId' => $row->id]);

            $acoes[] = Button::add('force-delete')
                ->slot('Excluir permanentemente')
                ->tooltip('Remover animal permanentemente do sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-rose-600 rounded-md text-rose-600 hover:text-white hover:bg-rose-600')
                ->dispatch('force-delete', ['animalId' => $row->id]);
                
        } else {

            $acoes[] = Button::add('view')
                ->slot('Ver')
                ->tooltip('Observar informações do animal no sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('view', ['animalId' => $row->id]);

            $acoes[] = Button::add('edit')
                ->slot('Editar')
                ->tooltip('Editar informações do animal no sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('edit', ['animalId' => $row->id]);
            
            $acoes[] = Button::add('delete')
                ->slot('Excluir')
                ->tooltip('Remover animal do sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-rose-600 rounded-md text-rose-600 hover:text-white hover:bg-rose-600')
                ->dispatch('delete', ['animalId' => $row->id]);

        }

        return $acoes;
    }

}