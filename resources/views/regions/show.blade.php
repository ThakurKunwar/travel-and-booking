<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-3xl font-bold text-gray-800">{{ $region->name }}</h1>
        <p class="text-gray-500 mt-3 max-w-2xl">{{ $region->description }}</p>

        <h2 class="text-2xl font-semibold text-gray-700 mt-10 mb-6">Available Packages</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($packages as $package)
                <a href="{{ route('packages.show', $package->id) }}"
                   class="block bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">

                   <img src="https://picsum.photos/seed/{{ $package->slug }}/600/300"
     class="w-full h-44 object-cover" />

                    <h3 class="text-lg font-semibold text-gray-800">{{ $package->title }}</h3>
                    <p class="text-gray-500 text-sm mt-2 line-clamp-2">{{ $package->description }}</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-orange-400 font-bold">${{ number_format($package->price, 2) }}</span>
                        <span class="text-gray-400 text-sm">{{ $package->duration_days }} days</span>
                    </div>
                </a>
            @empty
                <p class="text-gray-400">No packages available for this region yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>