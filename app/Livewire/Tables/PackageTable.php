<?php

namespace App\Livewire\Tables;

use App\Livewire\PowerGrid\PowerGridComponent;
use App\Repositories\PackageRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;

final class PackageTable extends PowerGridComponent
{
    public string $tableName = 'package-table';
    public string $primaryKey = 'id';

    public function __construct()
    {
        $this->repository = new PackageRepository();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('title')
            ->add('description')
            ->add('price', fn($row) => $row->price . '$')
            ->add('region', fn($package) => $package->region->name)
            ->add('duration_days')
            ->add(
                'images',
                fn($row) => $row->media->isNotEmpty()
                    ? Blade::render(
                        '@foreach($media as $m)
            <img src="{{ $m->full_url }}" width="40" class="inline-block rounded -ml-1">
        @endforeach',
                        ['media' => $row->media]
                    )
                    : 'No Images'
            )

            ->add('is_active');
    }

    public function columns(): array
    {
        return
            [
                Column::make('Title', 'title')->sortable()->searchable(),
                Column::make('Region', 'region'),
                Column::make('Price', 'price')->sortable(),
                Column::make('Duration', 'duration_days')->sortable(),
                Column::make('Images', 'images'), // html() might not work remember?
                Column::make('Status', 'is_active'),
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
