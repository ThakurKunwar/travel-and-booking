<x-app-layout>
<div class="max-w-2xl mx-auto px-4 py-10">

    {{-- Header --}}
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Plan Your Trek</h1>
        <p class="text-gray-400 mt-2 text-sm">Fill in your details and we'll get back to you within 24 hours</p>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('plan-trek.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Full Name + Email --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                        Full Name <span class="text-red-400">*</span>
                    </label>
                    <input
                        type="text"
                        name="full_name"
                        value="{{ old('full_name') }}"
                        placeholder="John Doe"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition @error('full_name') border-red-400 @enderror"
                    >
                    @error('full_name')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                        Email <span class="text-red-400">*</span>
                    </label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="john@example.com"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition @error('email') border-red-400 @enderror"
                    >
                    @error('email')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Country + Phone --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                        Country <span class="text-red-400">*</span>
                    </label>
                    <input
                        type="text"
                        name="country"
                        value="{{ old('country') }}"
                        placeholder="United States"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition @error('country') border-red-400 @enderror"
                    >
                    @error('country')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                        Phone <span class="text-gray-300 font-normal normal-case">(optional)</span>
                    </label>
                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="+1 234 567 8900"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition"
                    >
                </div>
            </div>

            {{-- Region + Travellers --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                        Region <span class="text-red-400">*</span>
                    </label>
                    <select
                        name="region_id"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition @error('region_id') border-red-400 @enderror"
                    >
                        <option value="">Select a region</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                {{ $region->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('region_id')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                        No. of Travellers <span class="text-red-400">*</span>
                    </label>
                    <input
                        type="number"
                        name="no_of_travellers"
                        value="{{ old('no_of_travellers') }}"
                        placeholder="e.g. 4"
                        min="1"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition @error('no_of_travellers') border-red-400 @enderror"
                    >
                    @error('no_of_travellers')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Preferable Date --}}
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                    Preferable Date <span class="text-gray-300 font-normal normal-case">(optional)</span>
                </label>
                <input
                    type="date"
                    name="preferable_date"
                    value="{{ old('preferable_date') }}"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition"
                >
            </div>

            {{-- Special Requests --}}
            <div>
                <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                    Special Requests <span class="text-gray-300 font-normal normal-case">(optional)</span>
                </label>
                <textarea
                    name="special_requests"
                    rows="4"
                    placeholder="Any dietary requirements, fitness concerns, special accommodations..."
                    class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition resize-none"
                >{{ old('special_requests') }}</textarea>
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full bg-orange-400 hover:bg-orange-500 text-white font-semibold py-3 rounded-lg text-sm transition">
                Submit Inquiry
            </button>

        </form>
    </div>

    <p class="text-center text-xs text-gray-400 mt-4">
        We typically respond within 24 hours via email or phone.
    </p>

</div>
</x-app-layout>