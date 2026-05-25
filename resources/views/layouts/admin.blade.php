<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
      @livewireStyles 
  
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 flex">
        <!-- Simple Sidebar -->
        <div class="w-64 bg-gray-800 text-white min-h-screen p-4">
            <h2 class="text-xl font-bold mb-6">Admin Panel</h2>
            
            <nav class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" 
                   class="block px-3 py-2 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                    📊 Dashboard
                </a>
               <a href="{{ route('admin.regions.index') }}" 
   class="block px-3 py-2 rounded {{ request()->routeIs('admin.regions.*') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
    🌍 Regions
</a>
                <a href="{{route('admin.packages.index')}}" 
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    📦 Packages
                </a>
                <a href="#" 
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    📝 Blogs
                </a>
                <a href="#" 
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    💬 Contacts
                </a>
                <hr class="my-4 border-gray-600">
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="block px-3 py-2 rounded hover:bg-gray-700">
                    🚪 Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            {{ $slot }}
        </div>
    </div>
     @livewireScripts
     
</body>
</html>