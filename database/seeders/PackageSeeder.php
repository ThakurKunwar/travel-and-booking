<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Region;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            // Everest Region
            [
                'region'       => 'Everest Region',
                'title'        => 'Everest Base Camp Trek',
                'slug'         => 'everest-base-camp-trek',
                'price'        => 1200.00,
                'duration_days' => 14,
                'description'  => 'The classic trek to the foot of the world\'s highest mountain. Walk through Sherpa villages, ancient monasteries, and dramatic high-altitude terrain to reach Everest Base Camp at 5364m.',
                'is_active'    => true,
            ],
            [
                'region'       => 'Everest Region',
                'title'        => 'Gokyo Lakes Trek',
                'slug'         => 'gokyo-lakes-trek',
                'price'        => 950.00,
                'duration_days' => 12,
                'description'  => 'A stunning alternative to EBC, this trek takes you to the beautiful turquoise Gokyo Lakes and the famous Gokyo Ri viewpoint with panoramic views of four 8000m peaks.',
                'is_active'    => true,
            ],

            // Annapurna Region
            [
                'region'       => 'Annapurna Region',
                'title'        => 'Annapurna Circuit Trek',
                'slug'         => 'annapurna-circuit-trek',
                'price'        => 1100.00,
                'duration_days' => 16,
                'description'  => 'One of the world\'s greatest treks, the Annapurna Circuit circumnavigates the entire Annapurna massif crossing the high Thorong La Pass at 5416m through diverse landscapes and cultures.',
                'is_active'    => true,
            ],
            [
                'region'       => 'Annapurna Region',
                'title'        => 'Poon Hill Sunrise Trek',
                'slug'         => 'poon-hill-sunrise-trek',
                'price'        => 450.00,
                'duration_days' => 5,
                'description'  => 'Perfect for beginners, this short trek rewards you with one of the most iconic sunrise views in Nepal from Poon Hill at 3210m overlooking the Annapurna and Dhaulagiri ranges.',
                'is_active'    => true,
            ],
            [
                'region'       => 'Annapurna Region',
                'title'        => 'Annapurna Base Camp Trek',
                'slug'         => 'annapurna-base-camp-trek',
                'price'        => 800.00,
                'duration_days' => 10,
                'description'  => 'Trek deep into the Annapurna Sanctuary, a natural amphitheatre surrounded by towering peaks. Reach the base camp at 4130m for a close up view of Annapurna I.',
                'is_active'    => true,
            ],

            // Langtang Region
            [
                'region'       => 'Langtang Region',
                'title'        => 'Langtang Valley Trek',
                'slug'         => 'langtang-valley-trek',
                'price'        => 600.00,
                'duration_days' => 8,
                'description'  => 'A rewarding trek through the Langtang Valley offering stunning mountain views, yak pastures, and the warm hospitality of Tamang communities just a few hours from Kathmandu.',
                'is_active'    => true,
            ],
            [
                'region'       => 'Langtang Region',
                'title'        => 'Gosaikunda Lake Trek',
                'slug'         => 'gosaikunda-lake-trek',
                'price'        => 700.00,
                'duration_days' => 9,
                'description'  => 'A sacred pilgrimage and trekking destination, Gosaikunda Lake sits at 4380m and is revered by both Hindus and Buddhists. The trail passes through rhododendron forests and alpine meadows.',
                'is_active'    => true,
            ],

            // Mustang Region
            [
                'region'       => 'Mustang Region',
                'title'        => 'Upper Mustang Trek',
                'slug'         => 'upper-mustang-trek',
                'price'        => 2200.00,
                'duration_days' => 14,
                'description'  => 'Trek into the forbidden kingdom of Lo, a restricted area requiring a special permit. Explore ancient cave monasteries, walled villages, and surreal Tibetan plateau landscapes.',
                'is_active'    => true,
            ],
            [
                'region'       => 'Mustang Region',
                'title'        => 'Lower Mustang & Muktinath Trek',
                'slug'         => 'lower-mustang-muktinath-trek',
                'price'        => 950.00,
                'duration_days' => 10,
                'description'  => 'Visit the sacred Muktinath temple and explore the unique desert landscapes of lower Mustang, passing through apple orchards, ancient villages, and dramatic canyon scenery.',
                'is_active'    => true,
            ],

            // Kanchenjunga Region
            [
                'region'       => 'Kanchenjunga Region',
                'title'        => 'Kanchenjunga Base Camp Trek',
                'slug'         => 'kanchenjunga-base-camp-trek',
                'price'        => 1800.00,
                'duration_days' => 20,
                'description'  => 'One of Nepal\'s most remote and rewarding treks, this journey takes you to the base camps of the world\'s third highest mountain through pristine wilderness and traditional Rai and Limbu villages.',
                'is_active'    => true,
            ],
        ];

        foreach ($packages as $data) {
            $region = Region::where('name', $data['region'])->first();
            unset($data['region']);
            $region->packages()->create($data);
        }
    }
}
