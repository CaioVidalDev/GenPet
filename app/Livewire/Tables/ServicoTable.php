<?php

namespace App\Livewire\Tables;

use App\Models\Servico;
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

final class ServicoTable extends PowerGridComponent
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
        return Servico::query()
            ->join('animals', 'servicos.animal_id', '=', 'animals.id')
            ->select('servicos.*', 'animals.nome as animal_nome');
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
            Column::make('Serviço', 'nome')->searchable()->sortable(),
            Column::make('Animal', 'animal_nome')->searchable()->sortable(),
            Column::make('Valor', 'valor')->searchable()->sortable(),
            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('view')]
    public function view($servicoId): void
    {
        $this->redirect("servicos/$servicoId", navigate: true);
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($servicoId): void
    {
        $this->redirect("servicos/$servicoId/edit", navigate: true);
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($servicoId): void
    {
        Servico::destroy($servicoId);

        $this->success(
            title: 'Serviço excluído!',
            description: 'O Serviço foi excluído com sucesso.',
        );
    }

    #[\Livewire\Attributes\On('delete-multiple')]
    public function deleteMultiple(): void
    {
        $checkedValues = $this->checkboxValues;

        if (count($checkedValues) === 0) {
            $this->warning(
                title: 'Nenhum servico selecionado!',
                description: 'Nenhum servico foi selecionado',
            );
        } else {
            $servicosIds = array_values($checkedValues);

            Servico::destroy($servicosIds);

            $this->success(
                title: 'Serviços excluídos!',
                description: 'Os serviços foram excluídos com sucesso.',
            );
        }
    }

    #[\Livewire\Attributes\On('restore')]
    public function restore($servicoId): void
    {
        Servico::withTrashed()->find($servicoId)->restore();

            $this->success(
                title: 'Serviço restaurado!',
                description: 'O serviço foi restaurado com sucesso.',
            );
    }

    #[\Livewire\Attributes\On('force-delete')]
    public function forceDelete($servicoId): void
    {
        Servico::withTrashed()->find($servicoId)->forceDelete();

            $this->success(
                title: 'Serviço excluído permanentemente!',
                description: 'O serviço foi excluído permanentemente.',
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

    public function actions(Servico $row): array
    {

        if ($row->trashed()) {
          
            $acoes[] = Button::add('restore')
                ->slot('Restaurar')
                ->tooltip('Restaurar servico excluído ao sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('restore', ['servicoId' => $row->id]);

            $acoes[] = Button::add('force-delete')
                ->slot('Excluir permanentemente')
                ->tooltip('Remover servico permanentemente do sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-rose-600 rounded-md text-rose-600 hover:text-white hover:bg-rose-600')
                ->dispatch('force-delete', ['servicoId' => $row->id]);
                
        } else {

            $acoes[] = Button::add('view')
                ->slot('Ver')
                ->tooltip('Observar informações do servico no sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('view', ['servicoId' => $row->id]);

            $acoes[] = Button::add('edit')
                ->slot('Editar')
                ->tooltip('Editar informações do servico no sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-black rounded-md text-black hover:text-white hover:bg-black')
                ->dispatch('edit', ['servicoId' => $row->id]);
            
            $acoes[] = Button::add('delete')
                ->slot('Excluir')
                ->tooltip('Remover servico do sistema')
                ->id()
                ->class('py-1 px-4 border-2 border-rose-600 rounded-md text-rose-600 hover:text-white hover:bg-rose-600')
                ->dispatch('delete', ['servicoId' => $row->id]);

        }

        return $acoes;
    }

}