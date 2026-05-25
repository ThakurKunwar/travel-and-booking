<x-admin-layout>
<div class="h-[calc(100vh-3rem)] flex flex-col max-w-6xl mx-auto">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-4 flex-shrink-0">
        <div>
            <h1 class="text-xl font-bold text-gray-800">
                {{ isset($package->id) ? 'Edit Package' : 'Create Package' }}
            </h1>
            <p class="text-xs text-gray-400 mt-0.5">
                {{ isset($package->id) ? 'Update package details below' : 'Fill in the details to add a new package' }}
            </p>
        </div>
        <a href="{{ route('admin.packages.index') }}"
           class="bg-white border border-gray-300 text-gray-600 px-3 py-1.5 rounded-lg hover:bg-gray-50 text-sm flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back
        </a>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 flex flex-col flex-1 overflow-hidden">
        <form action="{{ isset($package->id)
                ? route('admin.packages.update', $package->id)
                : route('admin.packages.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="flex flex-col flex-1 overflow-hidden">
            @csrf
            @if(isset($package->id)) @method('PUT') @endif

            {{-- Two column body --}}
            <div class="grid grid-cols-2 gap-0 flex-1 overflow-hidden">

                {{-- LEFT: Text fields --}}
                <div class="p-6 border-r border-gray-100 space-y-4 overflow-y-auto">

                    {{-- Title --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                            Package Title <span class="text-red-400">*</span>
                        </label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title', $package->title ?? '') }}"
                            placeholder="e.g. Everest Base Camp Trek"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('title') border-red-400 @enderror"
                        >
                        @error('title')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                            Slug <span class="text-gray-300 font-normal normal-case">(auto)</span>
                        </label>
                        <input
                            type="text"
                            id="slug"
                            name="slug"
                            value="{{ old('slug', $package->slug ?? '') }}"
                            placeholder="everest-base-camp-trek"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-gray-50 text-gray-400 focus:outline-none cursor-not-allowed"
                            readonly
                        >
                    </div>

                    {{-- Region + Duration row --}}
                    <div class="grid grid-cols-2 gap-3">
                        {{-- Region --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                                Region <span class="text-red-400">*</span>
                            </label>
                            <select
                                name="region_id"
                                class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('region_id') border-red-400 @enderror"
                            >
                                <option value="">Select Region</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}"
                                        {{ old('region_id', $package->region_id ?? '') == $region->id ? 'selected' : '' }}>
                                        {{ $region->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('region_id')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Duration --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                                Duration (days) <span class="text-red-400">*</span>
                            </label>
                            <input
                                type="number"
                                name="duration_days"
                                value="{{ old('duration_days', $package->duration_days ?? '') }}"
                                placeholder="e.g. 14"
                                min="1"
                                class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('duration_days') border-red-400 @enderror"
                            >
                            @error('duration_days')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Price --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                            Price (USD) <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-sm text-gray-400">$</span>
                            <input
                                type="number"
                                name="price"
                                value="{{ old('price', $package->price ?? '') }}"
                                placeholder="0.00"
                                min="0"
                                step="1"
                                class="w-full border border-gray-200 rounded-lg pl-7 pr-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('price') border-red-400 @enderror"
                            >
                        </div>
                        @error('price')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                            Description
                        </label>
                        <textarea
                            name="description"
                            rows="4"
                            placeholder="Describe this package — itinerary, inclusions, difficulty level..."
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none @error('description') border-red-400 @enderror"
                        >{{ old('description', $package->description ?? '') }}</textarea>
                        @error('description')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Active toggle --}}
                    <div class="flex items-center justify-between py-2 px-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Active Package</p>
                            <p class="text-xs text-gray-400">Visible on the website</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                {{ old('is_active', $package->is_active ?? true) ? 'checked' : '' }}
                                class="sr-only peer"
                            >
                            <div class="w-10 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>

                {{-- RIGHT: Images --}}
                <div class="p-6 flex flex-col gap-4 overflow-y-auto">
                    <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide">
                        Package Images
                    </label>

                    {{-- Existing images --}}
                    @if(isset($package->id) && $package->media->isNotEmpty())
                        <div>
                            <p class="text-xs text-gray-400 mb-2">Existing images</p>
                            <div class="grid grid-cols-3 gap-2">
                                @foreach($package->media as $media)
                                    <div class="relative group">
                                        <img src="{{ $media->full_url }}"
                                            class="w-full h-24 object-cover rounded-lg border border-gray-200">
                                        {{-- delete single image --}}
                                        <form action="{{ route('admin.packages.media.destroy', $media->id) }}"
                                            method="POST"
                                            class="absolute top-1 right-1 hidden group-hover:block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center hover:bg-red-600">
                                                ✕
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- New image preview --}}
                    <div class="border-2 border-dashed border-gray-200 rounded-xl flex-1 flex items-center justify-center bg-gray-50 min-h-32 overflow-hidden relative">
                        <div id="image-placeholder" class="text-center">
                            <svg class="mx-auto h-10 w-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="mt-2 text-xs text-gray-400">New images will appear here</p>
                        </div>
                        {{-- preview grid for newly selected images --}}
                        <div id="new-preview-grid" class="hidden w-full h-full grid grid-cols-3 gap-1 p-2 absolute inset-0"></div>
                    </div>

                    {{-- File Input --}}
                    <div>
                        <input
                            type="file"
                            name="images[]"
                            id="image-input"
                            accept="image/jpg,image/jpeg,image/png"
                            multiple
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 @error('images.*') border-red-400 @enderror"
                        >
                        <p class="text-gray-400 text-xs mt-1">JPG, JPEG, PNG — Select multiple files</p>
                        @error('images.*')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="px-6 py-3 bg-gray-50 border-t border-gray-200 rounded-b-xl flex items-center justify-end gap-2 flex-shrink-0">
                <a href="{{ route('admin.packages.index') }}"
                   class="px-4 py-2 text-sm text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Cancel
                </a>
                <button type="submit" name="action" value="stay"
                    class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                    {{ isset($package->id) ? 'Update' : 'Create' }}
                </button>
                <button type="submit" name="action" value="back"
                    class="px-4 py-2 text-sm font-semibold text-white bg-gray-600 rounded-lg hover:bg-gray-700 transition">
                    {{ isset($package->id) ? 'Update & Back' : 'Create & Back' }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Auto slug from title
    document.getElementById('title').addEventListener('input', function () {
        document.getElementById('slug').value = this.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-|-$/g, '');
    });

    // Preview multiple images
    document.getElementById('image-input').addEventListener('change', function () {
        const placeholder = document.getElementById('image-placeholder');
        const previewGrid = document.getElementById('new-preview-grid');
        const files = this.files;

        if (files.length > 0) {
            previewGrid.innerHTML = '';
            placeholder.classList.add('hidden');
            previewGrid.classList.remove('hidden');

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-full h-24 object-cover rounded-lg';
                    previewGrid.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    });
</script>
</x-admin-layout>