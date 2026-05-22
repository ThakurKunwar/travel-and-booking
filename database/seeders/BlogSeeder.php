<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'title'        => 'Everything You Need to Know Before Trekking Everest Base Camp',
                'slug'         => 'everything-you-need-to-know-before-trekking-everest-base-camp',
                'body'         => 'Trekking to Everest Base Camp is a bucket list experience for thousands of adventurers every year. But walking to the foot of the world\'s highest mountain is no casual stroll. Proper preparation can make the difference between a life-changing journey and a miserable retreat.

The first thing to understand is altitude. Acute Mountain Sickness (AMS) is a real risk above 3000m and the EBC trail climbs well above that. The golden rule is acclimatize slowly, never ascend more than 500m per day above 3000m, and take rest days at Namche Bazaar and Dingboche. Listen to your body — headaches and nausea are warning signs, not badges of honor.

Fitness matters too. You don\'t need to be an elite athlete, but you should be comfortable walking 5-7 hours a day for two consecutive weeks. Start training at least three months before your trek with long hikes, stair climbing, and cardio.

The best seasons are pre-monsoon (March to May) and post-monsoon (September to November). Avoid the monsoon season when trails are muddy and views are blocked by cloud, and winter when temperatures plummet dangerously.

Pack light but smart. Layers are everything at altitude — temperatures can swing 30 degrees between midday sun and a cold night at a teahouse. A good down jacket, waterproof shell, thermal base layers, and broken-in hiking boots are non-negotiable.',
                'published_at' => now()->subDays(10),
            ],
            [
                'title'        => 'Annapurna Circuit vs Everest Base Camp: Which Trek is Right for You?',
                'slug'         => 'annapurna-circuit-vs-everest-base-camp',
                'body'         => 'Two of Nepal\'s most famous treks, two completely different experiences. If you\'re trying to decide between the Annapurna Circuit and Everest Base Camp, the honest answer is they\'re not really comparable — they offer different things entirely.

EBC is all about pilgrimage. There\'s one goal, one iconic destination, and the entire trail builds toward that moment when you stand at 5364m looking up at the Khumbu Icefall. It\'s a powerful, focused experience with a strong Sherpa cultural thread running through it.

The Annapurna Circuit is a journey. Circumnavigating the entire Annapurna massif, you pass through subtropical rice paddies, alpine forests, high desert plateau, and everything in between. The cultural diversity is extraordinary — Hindu villages at lower elevations give way to Tibetan Buddhist communities as you climb higher.

Difficulty-wise, both treks reach similar maximum altitudes — EBC at 5364m and the Annapurna Circuit\'s Thorong La Pass at 5416m. The Circuit is generally considered harder due to its length and the sustained effort required.

If this is your first Himalayan trek and you want that singular iconic experience, go EBC. If you want more variety, fewer crowds on certain sections, and a more complete cultural immersion, the Annapurna Circuit is hard to beat.',
                'published_at' => now()->subDays(25),
            ],
            [
                'title'        => 'Hidden Gem: Why Langtang Should Be on Every Trekker\'s List',
                'slug'         => 'why-langtang-should-be-on-every-trekkers-list',
                'body'         => 'Ask most first-time visitors to Nepal what trek they\'re doing and the answer is almost always Everest or Annapurna. Langtang barely gets a mention. That\'s a shame, because the Langtang Valley is one of the most beautiful and accessible trekking regions in the country.

Located just 50km north of Kathmandu, Langtang is the closest major trekking region to the capital. You can be on the trail within three hours of landing at Tribhuvan International Airport — no expensive flights to Lukla, no long bus journeys to Pokhara.

The valley itself is dramatic. Glaciers tumble down from peaks above 7000m into a wide valley floor dotted with Tamang villages. The people here are warm and resilient — many communities were devastated by the 2015 earthquake and rebuilt with remarkable determination.

The trekking is varied too. You can do a straightforward valley trek in 7-8 days, extend to Kyanjin Ri for panoramic views, or push on to Gosaikunda Lake for a sacred high-altitude experience. The rhododendron forests in spring are some of the best in Nepal.

And the crowds? Almost nonexistent compared to Everest and Annapurna. If you want to feel like you\'re actually discovering something, Langtang delivers.',
                'published_at' => now()->subDays(40),
            ],
            [
                'title'        => 'Upper Mustang: Trekking Inside the Forbidden Kingdom',
                'slug'         => 'upper-mustang-trekking-inside-the-forbidden-kingdom',
                'body'         => 'Upper Mustang was closed to foreigners until 1992. Even today it requires a special restricted area permit costing $500 for the first ten days. Most trekkers never make it here. That exclusivity is part of what makes it so extraordinary.

The landscape is like nothing else in Nepal. Where most of the country is defined by dense forests and terraced hillsides, Upper Mustang is pure Tibetan plateau — wind-sculpted desert canyons, eroded cliffs streaked in ochre and rust, and a sky so blue it seems artificial.

The ancient walled city of Lo Manthang is the highlight, a medieval fortress town that has changed little in centuries. White-washed houses cluster inside thick walls, monks in burgundy robes walk narrow lanes, and the sound of prayer horns drifts from monastery rooftops at dawn.

The cave monasteries are haunting. Thousands of man-made caves are carved into the cliff faces throughout the region, some dating back over 3000 years. Some were used for burial, some for meditation, some for reasons that remain mysterious.

Getting here requires either a long drive through the Kali Gandaki gorge or a short flight to Jomsom. The trek itself isn\'t technically difficult — the high-altitude passes are moderate — but the remoteness means self-sufficiency matters.',
                'published_at' => now()->subDays(55),
            ],
            [
                'title'        => 'Best Time to Visit Nepal for Trekking: A Month by Month Guide',
                'slug'         => 'best-time-to-visit-nepal-for-trekking',
                'body'         => 'Nepal has four distinct seasons and not all of them are created equal for trekking. Knowing when to go can completely transform your experience.

October and November are the undisputed kings of trekking season. The monsoon has just cleared the air, visibility is razor sharp, and temperatures are comfortable at most elevations. The trails are busy but for good reason — conditions are simply perfect.

March, April, and May are the second peak season. Rhododendrons are in full bloom painting the hillsides in red and pink, and the weather is generally stable. Higher elevations still get cold nights but daytime trekking is pleasant. The downside is that late May brings the pre-monsoon haze which can reduce summit views.

December and January are cold but surprisingly good for lower elevation treks like the Annapurna foothills or cultural tours around Kathmandu valley. High passes like Thorong La can be snowed in so the full Circuit isn\'t advisable.

February sees conditions improving. Clear days become more frequent and the high-altitude routes start opening up again. It\'s a shoulder month that savvy trekkers use to avoid the October rush.

June through September is monsoon season. Trekking isn\'t impossible — Mustang and the rain-shadow areas behind the Annapurna range stay relatively dry — but most of Nepal is wet, leech-infested, and cloudy. Unless you\'re specifically going to a rain-shadow region, wait it out.',
                'published_at' => now()->subDays(70),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
