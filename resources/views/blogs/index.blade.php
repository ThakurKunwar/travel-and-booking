<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Blog</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($blogs as $blog)
                <a href="{{ route('blog.show', $blog->slug) }}"
                   class="block bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                   <img src="https://picsum.photos/seed/{{ $blog->slug }}/600/300"
     class="w-full h-44 object-cover" />
                    <h2 class="text-lg font-semibold text-gray-800">{{ $blog->title }}</h2>
                    <p class="text-gray-500 text-sm mt-2 line-clamp-3">{{ Str::limit($blog->body, 120) }}</p>
                    <span class="inline-block mt-4 text-xs text-gray-400">
                        {{ $blog->published_at->format('M d, Y') }}
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>