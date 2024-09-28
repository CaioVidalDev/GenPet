<?php

namespace App\Livewire\Tables;

use App\Models\Guardiao;
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

final class GuardiaoTable extends PowerGridComponent
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
        return Guardiao::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields();
    }

    public function columns(): array
    {
        return [
            Column::make('Nome', 'nome')->searchable()->sortable(),
            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('view')]
    public function view($guardiaoId): void
    {
        $this->redirect("guardiaos/$guardiaoId", navigate: true);
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($guardiaoId): void
    {
        $this->redirect("guardiaos/$guardiaoId/edit", navigate: true);
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($guardiaoId): void
    {
        Guardiao::destroy($guardiaoId);

        $this->success(
            title: 'guardiao excluído!',
            description: 'O guardiao foi excluído com sucesso.',
        );
    }

    #[\Livewire\Attributes\On('delete-multiple')]
    public function deleteMultiple(): void
    {
        $checkedValues = $this->checkboxValues;

        if (count($checkedValues) === 0) {
            $this->warning(
                title: 'Nenhum guardiao selecionado!',
                description: 'Nenhum guardiao foi selecionado',
            );
        } else {
            $guardiaosIds = array_values($checkedValues);

            Guardiao::destroy($guardiaosIds);

            $this->success(
                title: 'guardiaos excluídos!',
                description: 'Os guardiaos foram excluídos com sucesso.',
            );
        }
    }

    #[\Livewire\Attributes\On('restore')]
    public function restore($guardiaoId): void
    {
        Guardiao::withTrashed()->find($guardiaoId)->restore();

            $this->success(
                title: 'guardiao restaurado!',
                description: 'O guardiao foi restaurado com sucesso.',
            );
    }

    #[\Livewire\Attributes\On('force-delete')]
    public function forceDelete($guardiaoId): void
    {
        Guardiao::withTrashed()->find($guardiaoId)->forceDelete();

            $this->success(
                title: 'guardiao excluído permanentemente!',
                description: 'O guardiao foi excluído permanentemente.',
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

    public function actions(Guardiao $row): array
    {

        if ($row->trashed()) {
          
            $acoes[] = Button::add('restore')
                ->slot('Restaurar')
                ->tooltip('Restaurar guardiao excluído ao sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('restore', ['guardiaoId' => $row->id]);

            $acoes[] = Button::add('force-delete')
                ->slot('Excluir permanentemente')
                ->tooltip('Remover guardiao permanentemente do sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-rose-600 rounded-md text-rose-600 hover:text-white hover:bg-rose-600')
                ->dispatch('force-delete', ['guardiaoId' => $row->id]);
                
        } else {

            $acoes[] = Button::add('view')
                ->slot('Ver')
                ->tooltip('Observar informações do guardiao no sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('view', ['guardiaoId' => $row->id]);

            $acoes[] = Button::add('edit')
                ->slot('Editar')
                ->tooltip('Editar informações do guardiao no sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('edit', ['guardiaoId' => $row->id]);
            
            $acoes[] = Button::add('delete')
                ->slot('Excluir')
                ->tooltip('Remover guardiao do sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-rose-600 rounded-md text-rose-600 hover:text-white hover:bg-rose-600')
                ->dispatch('delete', ['guardiaoId' => $row->id]);

        }

        return $acoes;
    }

}