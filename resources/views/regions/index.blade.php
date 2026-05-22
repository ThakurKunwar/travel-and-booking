<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Destinations</h1>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($regions as $region)
           <a href="{{ route('regions.show', $region->id) }}"
   class="block bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
    
    {{-- placeholder until media is ready --}}
    @if($region->media)
    <img src="{{ $region->media->full_url }}" />
    @else
    <img src="https://picsum.photos/seed/{{ $region->slug }}/600/300"
         class="w-full h-44 object-cover" />
         @endif

    <div class="p-6">
        <h2 class="text-xl font-semibold text-gray-800">{{ $region->name }}</h2>
        <p class="text-gray-500 text-sm mt-2 line-clamp-3">{{ $region->description }}</p>
        <span class="inline-block mt-4 text-sm text-orange-400 font-medium">Explore →</span>
    </div>
</a>
            @endforeach
        </div>
    </div>
</x-app-layout>