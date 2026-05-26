<?php

namespace App\Livewire\Tables;

use App\Livewire\PowerGrid\PowerGridComponent;
use App\Repositories\PlanTrekRepository;
use Illuminate\Database\Eloquent\Model;
use Override;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;

class PlanTrekTable extends PowerGridComponent
{
    public string $tableName = 'plan-trek-table';
    public string $primaryKey = 'id';

    public function __construct()
    {
        $this->repository = new PlanTrekRepository();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('full_name')
            ->add('email')
            ->add('country')
            ->add('no_of_travellers')
            ->add('region', fn($row) => $row->region->name ?? 'N/A')
            ->add(
                'preferable_date',
                fn($row) => $row->preferable_date
                    ? $row->preferable_date->format('d M Y')
                    : 'Not set'
            )
            ->add('is_read');
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'full_name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->searchable(),

            Column::make('Country', 'country')
                ->sortable()
                ->searchable(),

            Column::make('Travellers', 'no_of_travellers')
                ->sortable(),

            Column::make('Region', 'region'),


            Column::make('SpecialRequest', 'special_requests'),


            Column::make('Date', 'preferable_date')
                ->sortable(),

            Column::make('Status', 'is_read')
                ->toggleable(
                    hasPermission: true,
                    trueLabel: 'Read',
                    falseLabel: 'Unread'
                ),

            Column::action('Action'),
        ];
    }

    public function actions(Model $row): array
    {
        return [
            $this->deleteButton($row),
        ];
    }
    #[Override]
    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        $record = $this->repository->findOrFail($id);
        $record->forcefill([$field => $value])->save();
    }
}
