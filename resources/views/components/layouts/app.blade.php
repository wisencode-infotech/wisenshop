<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel Livewire App' }}</title>
    @vite('resources/css/app.css') <!-- Include your stylesheets -->
    @livewireStyles
</head>
<body>

    <!-- Include the Livewire Header Component -->
    @livewire('header')

    <main>
        {{ $slot }} <!-- This is where the page-specific content will be rendered -->
    </main>

    <!-- Include the Livewire Footer Component -->
    @livewire('footer')

    @livewireScripts
    @vite('resources/js/app.js') <!-- Include your scripts -->
</body>
</html>
