<?php

namespace App\Livewire\PowerGrid;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Override;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent as BasePowerGridComponent;

class PowerGridComponent extends BasePowerGridComponent
{
    //defining here so that we can use it later
    protected $repository;
    //for displaying 
    public int $perPage = 10;
    public string $sortField = 'id';
    public string $sortDirection = 'desc';

    public  function setUp(): array
    {
        $this->showCheckBox();
        return [
            PowerGrid::header()->showSearchInput(),
            PowerGrid::footer()->showPerPage()
                ->showRecordCount(),
        ];
    }
    public function datasource(): Builder
    {
        return $this->repository->prepareModel();
    }
    public function editButton(Model $row): Button
    {
        return Button::add('edit')
            ->slot('Edit')
            ->route("admin.{$this->repository->modelNames}.edit", [
                $this->repository->modelKey => $row->id
            ])
            ->class('bg-blue-500 text-white px-3 py-1 rounded text-sm');
    }
    public function deleteButton(Model $row): Button
    {
        return Button::add('delete')
            ->slot('Delete')
            ->class('bg-red-500 text-white px-3 py-1 rounded text-sm')
            ->dispatch('deleteConfirm', ['rowId' => $row->id]);
    }
    #[\Livewire\Attributes\On('deleteConfirm')]
    public function deleteConfirm($rowId)
    {
        try {
            $this->repository->delete($rowId);
        } catch (Exception $e) {
            session()->flash('error', 'couldnot delete tryagain later');
        }
    }
    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        $this->repository->update($id, [$field => $value]);
    }
    public function actions(Model $row): array
    {
        return [
            $this->editButton($row),
            $this->deleteButton($row),
        ];
    }
}
