<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Petugas Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full bg-gray-100">
    <div class="flex h-screen">
        <aside class="w-64 bg-primary text-white flex flex-col">
            <div class="p-6 font-bold text-xl">Petugas Panel</div>
            <nav class="flex-1">
                <a href="{{ route('petugas.dashboard') }}" class="block px-6 py-2 hover:bg-primary-dark">Dashboard</a>
                <a href="{{ route('petugas.schedules.index') }}" class="block px-6 py-2 hover:bg-primary-dark">Jadwal
                    Lab</a>
            </nav>
            <form method="POST" action="{{ route('logout') }}" class="p-6">
                @csrf
                <button type="submit" class="w-full py-2 bg-red-500 rounded hover:bg-red-600">Logout</button>
            </form>
        </aside>
        <main class="flex-1 p-6 overflow-auto">
            @yield('content')
        </main>
    </div>
</body>

</html>
