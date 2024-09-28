<?php

namespace App\Livewire\Tables;

use App\Models\Vacina;
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

final class VacinaTable extends PowerGridComponent
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
        return Vacina::query()
            ->with(['animal']);
    }

    public function relationSearch(): array
    {
        return [
            'animal' => ['nome']
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
        ->add('id')
        ->add('animal.nome');
    }

    public function columns(): array
    {
        return [
            Column::make('Vacina', 'nome')->searchable()->sortable(),
            Column::make('Animal', 'animal.nome')->searchable()->sortable(),
            Column::make('Laboratório', 'laboratorio')->searchable()->sortable(),
            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('view')]
    public function view($vacinaId): void
    {
        $this->redirect("vacinas/$vacinaId", navigate: true);
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($vacinaId): void
    {
        $this->redirect("vacinas/$vacinaId/edit", navigate: true);
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($vacinaId): void
    {
        Vacina::destroy($vacinaId);

        $this->success(
            title: 'Vacina excluída!',
            description: 'A Vacina foi excluída com sucesso.',
        );
    }

    #[\Livewire\Attributes\On('delete-multiple')]
    public function deleteMultiple(): void
    {
        $checkedValues = $this->checkboxValues;

        if (count($checkedValues) === 0) {
            $this->warning(
                title: 'Nenhuma cacina selecionado!',
                description: 'Nenhuma vacina foi selecionada',
            );
        } else {
            $vacinasIds = array_values($checkedValues);

            Vacina::destroy($vacinasIds);

            $this->success(
                title: 'Vacinas excluídas!',
                description: 'As vacinas foram excluídas com sucesso.',
            );
        }
    }

    #[\Livewire\Attributes\On('restore')]
    public function restore($vacinaId): void
    {
        Vacina::withTrashed()->find($vacinaId)->restore();

            $this->success(
                title: 'Vacina restaurada!',
                description: 'A Vacina foi restaurada com sucesso.',
            );
    }

    #[\Livewire\Attributes\On('force-delete')]
    public function forceDelete($vacinaId): void
    {
        Vacina::withTrashed()->find($vacinaId)->forceDelete();

            $this->success(
                title: 'Vacina excluída permanentemente!',
                description: 'A Vacina foi excluída permanentemente.',
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

    public function actions(Vacina $row): array
    {

        if ($row->trashed()) {
          
            $acoes[] = Button::add('restore')
                ->slot('Restaurar')
                ->tooltip('Restaurar vacina excluído ao sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('restore', ['vacinaId' => $row->id]);

            $acoes[] = Button::add('force-delete')
                ->slot('Excluir permanentemente')
                ->tooltip('Remover vacina permanentemente do sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-rose-600 rounded-md text-rose-600 hover:text-white hover:bg-rose-600')
                ->dispatch('force-delete', ['vacinaId' => $row->id]);
                
        } else {

            $acoes[] = Button::add('view')
                ->slot('Ver')
                ->tooltip('Observar informações do vacina no sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('view', ['vacinaId' => $row->id]);

            $acoes[] = Button::add('edit')
                ->slot('Editar')
                ->tooltip('Editar informações do vacina no sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('edit', ['vacinaId' => $row->id]);
            
            $acoes[] = Button::add('delete')
                ->slot('Excluir')
                ->tooltip('Remover vacina do sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-rose-600 rounded-md text-rose-600 hover:text-white hover:bg-rose-600')
                ->dispatch('delete', ['vacinaId' => $row->id]);

        }

        return $acoes;
    }

}