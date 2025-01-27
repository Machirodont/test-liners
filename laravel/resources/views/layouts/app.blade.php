<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">

<!-- Navbar or header -->
<header class="bg-indigo-600 text-white py-4 shadow-md">
    <nav>
        <ul class="flex space-x-6 justify-center">
            <li>
                <a href="{{ route('ships.index') }}" class="hover:text-indigo-300 transition-colors">Ships</a>
            </li>
            <li>
                <a href="{{ route('ships.create') }}" class="hover:text-indigo-300 transition-colors">Create Ship</a>
            </li>
        </ul>
    </nav>
</header>

<!-- Main content -->
<main class="container mx-auto px-4 py-8">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center py-4 mt-8">
    <p>&copy; {{ date('Y') }} PAC GROUP TEST TASK</p>
</footer>

</body>
</html>
