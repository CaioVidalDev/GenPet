<?php

namespace App\Livewire\Tables;

use App\Models\Tratamento;
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

final class TratamentoTable extends PowerGridComponent
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
        return Tratamento::query()
            ->join('animals', 'tratamentos.animal_id', '=', 'animals.id')
            ->select('tratamentos.*', 'animals.nome as animal_nome');
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
            ->add('animal_nome');
    }

    public function columns(): array
    {
        return [
            Column::make('Tratamento', 'tipo')->searchable()->sortable(),
            Column::make('Animal', 'animal_nome')->searchable()->sortable(),
            Column::make('Veterinário Responsável', 'veterinario_responsavel')->searchable()->sortable(),
            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('view')]
    public function view($tratamentoId): void
    {
        $this->redirect("tratamentos/$tratamentoId", navigate: true);
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($tratamentoId): void
    {
        $this->redirect("tratamentos/$tratamentoId/edit", navigate: true);
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($tratamentoId): void
    {
        Tratamento::destroy($tratamentoId);

        $this->success(
            title: 'Tratamento excluído!',
            description: 'O Tratamento foi excluído com sucesso.',
        );
    }

    #[\Livewire\Attributes\On('delete-multiple')]
    public function deleteMultiple(): void
    {
        $checkedValues = $this->checkboxValues;

        if (count($checkedValues) === 0) {
            $this->warning(
                title: 'Nenhum tratamento selecionado!',
                description: 'Nenhum tratamento foi selecionado',
            );
        } else {
            $tratamentosIds = array_values($checkedValues);

            Tratamento::destroy($tratamentosIds);

            $this->success(
                title: 'Tratamentos excluídos!',
                description: 'Os Tratamentos foram excluídos com sucesso.',
            );
        }
    }

    #[\Livewire\Attributes\On('restore')]
    public function restore($tratamentoId): void
    {
        Tratamento::withTrashed()->find($tratamentoId)->restore();

            $this->success(
                title: 'Tratamento restaurado!',
                description: 'O Tratamento foi restaurado com sucesso.',
            );
    }

    #[\Livewire\Attributes\On('force-delete')]
    public function forceDelete($tratamentoId): void
    {
        Tratamento::withTrashed()->find($tratamentoId)->forceDelete();

            $this->success(
                title: 'Tratamento excluído permanentemente!',
                description: 'O Tratamento foi excluído permanentemente.',
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

    public function actions(Tratamento $row): array
    {

        if ($row->trashed()) {
          
            $acoes[] = Button::add('restore')
                ->slot('Restaurar')
                ->tooltip('Restaurar tratamento excluído ao sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('restore', ['tratamentoId' => $row->id]);

            $acoes[] = Button::add('force-delete')
                ->slot('Excluir permanentemente')
                ->tooltip('Remover tratamento permanentemente do sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-rose-600 rounded-md text-rose-600 hover:text-white hover:bg-rose-600')
                ->dispatch('force-delete', ['tratamentoId' => $row->id]);
                
        } else {

            $acoes[] = Button::add('view')
                ->slot('Ver')
                ->tooltip('Observar informações do tratamento no sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('view', ['tratamentoId' => $row->id]);

            $acoes[] = Button::add('edit')
                ->slot('Editar')
                ->tooltip('Editar informações do tratamento no sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('edit', ['tratamentoId' => $row->id]);
            
            $acoes[] = Button::add('delete')
                ->slot('Excluir')
                ->tooltip('Remover tratamento do sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-rose-600 rounded-md text-rose-600 hover:text-white hover:bg-rose-600')
                ->dispatch('delete', ['tratamentoId' => $row->id]);

        }

        return $acoes;
    }

}