<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<!-- Navbar or header -->
<header>
    <nav>
        <ul>
            <li><a href="{{ route('ships.index') }}">Ships</a></li>
            <li><a href="{{ route('ships.create') }}">Create Ship</a></li>
        </ul>
    </nav>
</header>

<!-- Main content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
<footer>
    <p>&copy; {{ date('Y') }} PAC GROUP TEST TASK </p>
</footer>

</body>
</html>
