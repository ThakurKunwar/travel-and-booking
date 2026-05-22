<?php

namespace App\Livewire\Tables;

use App\Livewire\PowerGrid\PowerGridComponent;
use App\Repositories\RegionRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;

final class RegionTable extends PowerGridComponent
{
    public string $tableName = 'region-table';
    public string $primaryKey = 'id';

    public function __construct()
    {
        $this->repository = new RegionRepository();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add(
                'image',
                fn($row) => $row->media
                    ? Blade::render(
                        '<img src="{{ $url }}" width="50">',
                        ['url' => $row->media->full_url]

                    )
                    : 'No Image'
            )
            ->add('description')
            ->add(
                'is_active',
                fn($row) => $row->is_active
                    ? '<span class="text-green-600 font-semibold">Active</span>'
                    : '<span class="text-red-500 font-semibold">Inactive</span>'
            )
            ->add('created_at', fn($row) => $row->created_at->format('Y-m-d'));
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable(),

            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Description', 'description'),

            Column::make('Image', 'image'),

            Column::make('Status', 'is_active'),
            // ->toggleable(
            //     hasPermission: true,
            //     trueLabel: 'Active',
            //     falseLabel: 'Inactive'
            // ),

            Column::make('Created At', 'created_at')
                ->sortable(),

            Column::action('Action'),
        ];
    }

    public function actions(Model $row): array
    {
        return [
            $this->editButton($row),
            $this->deleteButton($row),
        ];
    }
}
