<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [
            [
                'name'        => 'Everest Region',
                'slug'        => 'everest-region',
                'description' => 'Home to the world\'s highest peak, the Everest Region offers breathtaking landscapes, Sherpa culture, and legendary trekking trails through Sagarmatha National Park.',
                'is_active'   => true,
            ],
            [
                'name'        => 'Annapurna Region',
                'slug'        => 'annapurna-region',
                'description' => 'One of the most diverse trekking destinations in the world, the Annapurna Region features everything from subtropical forests to high alpine terrain, with stunning views of the Annapurna massif.',
                'is_active'   => true,
            ],
            [
                'name'        => 'Langtang Region',
                'slug'        => 'langtang-region',
                'description' => 'Just north of Kathmandu, the Langtang Region is a hidden gem with rich Tamang culture, glacial valleys, and easy access from the capital.',
                'is_active'   => true,
            ],
            [
                'name'        => 'Mustang Region',
                'slug'        => 'mustang-region',
                'description' => 'A restricted and mystical area bordering Tibet, Mustang is known for its ancient caves, Tibetan Buddhist monasteries, and dramatic desert landscapes unlike anywhere else in Nepal.',
                'is_active'   => true,
            ],
            [
                'name'        => 'Kanchenjunga Region',
                'slug'        => 'kanchenjunga-region',
                'description' => 'Remote and untouched, the Kanchenjunga Region offers a true wilderness experience around the world\'s third highest mountain, with rich biodiversity and minimal tourist traffic.',
                'is_active'   => true,
            ],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
