<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap" rel="stylesheet">

    <title>BitlabProjects 2.0</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="flex min-h-screen font-suse antialiased bg-black text-white/50">
    <x-navigation />

    <main class="flex-1 bg-black text-white/50 p-6">
        {{ $slot }}
    </main>
</body>
</html>
