<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Regions</h1>
        <a href="{{ route('admin.regions.create') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New Region
        </a>
    </div>

    @livewire('tables.region-table')

</x-admin-layout>