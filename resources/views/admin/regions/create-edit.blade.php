<x-admin-layout>
<div class="h-[calc(100vh-3rem)] flex flex-col max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-4 flex-shrink-0">
        <div>
            <h1 class="text-xl font-bold text-gray-800">
                {{ isset($region->id) ? 'Edit Region' : 'Create Region' }}
            </h1>
            <p class="text-xs text-gray-400 mt-0.5">
                {{ isset($region->id) ? 'Update region details below' : 'Fill in the details to add a new region' }}
            </p>
        </div>
        <a href="{{ route('admin.regions.index') }}"
           class="bg-white border border-gray-300 text-gray-600 px-3 py-1.5 rounded-lg hover:bg-gray-50 text-sm flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back
        </a>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 flex flex-col flex-1 overflow-hidden">
        <form action="{{ isset($region->id)
                ? route('admin.regions.update', $region->id)
                : route('admin.regions.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="flex flex-col flex-1 overflow-hidden">
            @csrf
            @if(isset($region->id)) @method('PUT') @endif

            {{-- Two column body --}}
            <div class="grid grid-cols-2 gap-0 flex-1 overflow-hidden">

                {{-- LEFT: Text fields --}}
                <div class="p-6 border-r border-gray-100 space-y-4 overflow-y-auto">

                    {{-- Name --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                            Region Name <span class="text-red-400">*</span>
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $region->name ?? '') }}"
                            placeholder="e.g. Everest Region"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition @error('name') border-red-400 @enderror"
                        >
                        @error('name')
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
                            value="{{ old('slug', $region->slug ?? '') }}"
                            placeholder="everest-region"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-gray-50 text-gray-400 focus:outline-none cursor-not-allowed"
                            readonly
                        >
                    </div>

                    {{-- Description --}}
                    <div class="flex-1">
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5 uppercase tracking-wide">
                            Description
                        </label>
                        <textarea
                            name="description"
                            rows="6"
                            placeholder="Describe this region — its attractions, climate, best time to visit..."
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none @error('description') border-red-400 @enderror"
                        >{{ old('description', $region->description ?? '') }}</textarea>
                        @error('description')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Active toggle --}}
                    <div class="flex items-center justify-between py-2 px-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Active Region</p>
                            <p class="text-xs text-gray-400">Visible on the website</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                {{ old('is_active', $region->is_active ?? true) ? 'checked' : '' }}
                                class="sr-only peer"
                            >
                            <div class="w-10 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>

                {{-- RIGHT: Image --}}
                <div class="p-6 flex flex-col gap-4">
                    <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide">
                        Region Image
                    </label>

                    {{-- Preview Box --}}
                    <div class="border-2 border-dashed border-gray-200 rounded-xl flex-1 flex items-center justify-center bg-gray-50 min-h-48 overflow-hidden relative">
                        @if(isset($region->media))
                            <img id="image-preview"
                                src="{{ $region->media->full_url }}"
                                class="w-full h-full object-cover rounded-xl">
                        @else
                            <div id="image-placeholder" class="text-center">
                                <svg class="mx-auto h-10 w-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p class="mt-2 text-xs text-gray-400">No image uploaded</p>
                            </div>
                            <img id="image-preview" src="" class="w-full h-full object-cover rounded-xl hidden absolute inset-0">
                        @endif
                    </div>

                    {{-- File Input --}}
                    <div>
                        <input
                            type="file"
                            name="image"
                            id="image-input"
                            accept="image/jpg,image/jpeg,image/png"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 @error('image') border-red-400 @enderror"
                        >
                        <p class="text-gray-400 text-xs mt-1">JPG, JPEG, PNG — Max 2MB</p>
                        @error('image')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="px-6 py-3 bg-gray-50 border-t border-gray-200 rounded-b-xl flex items-center justify-end gap-2 flex-shrink-0">
                <a href="{{ route('admin.regions.index') }}"
                   class="px-4 py-2 text-sm text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Cancel
                </a>
               <button type="submit" name="action" value="stay"
    class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
    {{ isset($region->id) ? 'Update' : 'Create' }}
</button>

<button type="submit" name="action" value="back"
    class="px-4 py-2 text-sm font-semibold text-white bg-gray-600 rounded-lg hover:bg-gray-700 transition">
    {{ isset($region->id) ? 'Update & Back' : 'Create & Back' }}
</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Auto slug from name
    document.getElementById('name').addEventListener('input', function () {
        document.getElementById('slug').value = this.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-|-$/g, '');
    });

    // Image preview
    document.getElementById('image-input').addEventListener('change', function () {
        const preview = document.getElementById('image-preview');
        const placeholder = document.getElementById('image-placeholder');
        if (this.files[0]) {
            preview.src = URL.createObjectURL(this.files[0]);
            preview.classList.remove('hidden');
            if (placeholder) placeholder.classList.add('hidden');
        }
    });
</script>
</x-admin-layout>