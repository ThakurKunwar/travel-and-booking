<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">All Packages</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($packages as $package)
                <a href="{{ route('packages.show', $package->id) }}"
                   class="block bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">

                   <img src="https://picsum.photos/seed/{{ $package->slug }}/600/300"
     class="w-full h-44 object-cover" />
     
                    <span class="text-xs text-orange-400 font-medium uppercase tracking-wide">
                        {{ $package->region->name }}
                    </span>
                    <h2 class="text-lg font-semibold text-gray-800 mt-1">{{ $package->title }}</h2>
                    <p class="text-gray-500 text-sm mt-2 line-clamp-2">{{ $package->description }}</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-orange-400 font-bold">${{ number_format($package->price, 2) }}</span>
                        <span class="text-gray-400 text-sm">{{ $package->duration_days }} days</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>