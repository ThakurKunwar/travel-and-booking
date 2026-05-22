<x-admin-layout>
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Dashboard</h1>
    
    <!-- Stats Boxes Grid - 4 columns, auto-wrap on mobile -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- Regions Box -->
        <a href="{{route('admin.regions.index')}}" class="bg-white rounded-xl p-5 shadow-sm hover:shadow-md transition-all border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                  
                    <p class="text-sm text-gray-500">Regions</p>
                    <p class="text-2xl font-bold text-gray-800">{{$regionsCount}}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <span class="text-xl">🌍</span>
                </div>
            </div>
        </a>

        <!-- Packages Box -->
        <a href="#" class="bg-white rounded-xl p-5 shadow-sm hover:shadow-md transition-all border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Packages</p>
                    <p class="text-2xl font-bold text-gray-800">{{$packagesCount}}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <span class="text-xl">📦</span>
                </div>
            </div>
        </a>

        <!-- Blogs Box -->
        <a href="#" class="bg-white rounded-xl p-5 shadow-sm hover:shadow-md transition-all border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Blogs</p>
                    <p class="text-2xl font-bold text-gray-800">{{$blogsCount}}</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-lg">
                    <span class="text-xl">📝</span>
                </div>
            </div>
        </a>

        <!-- Contacts Box -->
        <a href="#" class="bg-white rounded-xl p-5 shadow-sm hover:shadow-md transition-all border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Contacts</p>
                    <p class="text-2xl font-bold text-gray-800">0</p>
                </div>
                <div class="bg-red-100 p-3 rounded-lg">
                    <span class="text-xl">💬</span>
                </div>
            </div>
        </a>

    </div>
</x-admin-layout>