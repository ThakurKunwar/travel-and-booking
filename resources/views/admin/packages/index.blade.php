<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Regions</h1>
        <a href="{{ route('admin.packages.create') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New Packages
        </a>
    </div>

    @livewire('tables.package-table')

</x-admin-layout>