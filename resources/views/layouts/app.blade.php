<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include Tailwind or other CSS -->
</head>
<body>
    <div class="container mx-auto p-4">
        @yield('content') <!-- Section for content -->
    </div>
</body>
</html>
