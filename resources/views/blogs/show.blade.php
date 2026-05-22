<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-3xl font-bold text-gray-800">{{ $blog->title }}</h1>
        <span class="text-sm text-gray-400 mt-2 block">{{ $blog->published_at->format('M d, Y') }}</span>

        <div class="mt-8 text-gray-600 leading-relaxed whitespace-pre-line">
            {{ $blog->body }}
        </div>
    </div>
</x-app-layout>