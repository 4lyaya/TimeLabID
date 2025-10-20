<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMK Lab Schedule')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-primary text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="font-bold text-xl">SMK Lab Schedule</h1>
            <nav>
                <a href="{{ route('public.home') }}" class="px-3 py-1 hover:underline">Home</a>
            </nav>
        </div>
    </header>
    <main class="flex-1 container mx-auto p-6">
        @yield('content')
    </main>
    <footer class="bg-gray-200 text-gray-700 p-4 text-center">
        &copy; {{ date('Y') }} SMK Lab Schedule
    </footer>
</body>

</html>
