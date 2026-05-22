<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <span class="text-sm text-orange-400 font-medium">{{ $package->region->name }}</span>
        <h1 class="text-3xl font-bold text-gray-800 mt-1">{{ $package->title }}</h1>

        <div class="flex gap-6 mt-4 text-sm text-gray-500">
            <span>${{ number_format($package->price, 2) }}</span>
            <span>{{ $package->duration_days }} days</span>
        </div>

        <p class="mt-6 text-gray-600 leading-relaxed">{{ $package->description }}</p>

        @auth
            <div class="mt-8">
                <a href="#" class="px-6 py-2.5 bg-orange-400 hover:bg-orange-500 text-white font-semibold rounded-full transition shadow-sm">
                    Book This Package
                </a>
            </div>
        @else
            <div class="mt-8">
                <a href="{{ route('login') }}" class="px-6 py-2.5 bg-orange-400 hover:bg-orange-500 text-white font-semibold rounded-full transition shadow-sm">
                    Log in to Book
                </a>
            </div>
        @endauth

        <!-- Reviews -->
        <div class="mt-12">
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Reviews</h2>

           @forelse($reviews as $review)
    <div class="bg-white rounded-xl border border-gray-100 p-5 mb-4 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <span class="font-medium text-gray-800">{{ $review->user->name }}</span>
            <div class="flex items-center gap-3">
                <span class="text-yellow-400 text-sm">{{ str_repeat('★', $review->rating) }}</span>
                @auth
                    @if(auth()->id() === $review->user_id)
                        <form method="POST" action="{{ route('reviews.destroy', $review->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-red-400 hover:text-red-600">Delete</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
        <p class="text-gray-500 text-sm">{{ $review->body }}</p>
    </div>
@empty
    <p class="text-gray-400">No reviews yet. Be the first!</p>
@endforelse
        </div>

        @auth
    <form method="POST" action="{{ route('reviews.store', $package->id) }}" class="mt-8 bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
        @csrf

        <h3 class="text-lg font-semibold text-gray-800 mb-4">Leave a Review</h3>

        {{-- Rating --}}
        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Rating</label>
            <select name="rating" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none">
                <option value="5">★★★★★</option>
                <option value="4">★★★★</option>
                <option value="3">★★★</option>
                <option value="2">★★</option>
                <option value="1">★</option>
            </select>
        </div>

        {{-- Body --}}
        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Your Review</label>
            <textarea name="body" rows="4"
                class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none"
                placeholder="Share your experience..."></textarea>
        </div>

        <button type="submit"
                class="px-5 py-2 bg-orange-400 hover:bg-orange-500 text-white text-sm font-semibold rounded-full transition">
            Submit Review
        </button>
    </form>
@else
    <p class="mt-6 text-sm text-gray-400">
        <a href="{{ route('login') }}" class="text-orange-400 hover:underline">Log in</a> to leave a review.
    </p>
@endauth
    </div>
</x-app-layout>