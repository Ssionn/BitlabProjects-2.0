<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap" rel="stylesheet">

    <title>Laravel</title>

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="font-suse antialiased bg-black text-white/50">
    <div class="bg-black text-white/50">
        <div class="min-h-screen relative flex flex-col items-center justify-center selection:text-white">
            <div class="w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="flex flex-col items-center space-y-8 animate-fadeIn">
                    <div class="text-3xl font-bold">
                        <h1> </h1>
                    </div>
                    <div class="text-6xl font-bold">
                        <h1>Welcome.</h1>
                    </div>
                    @if (Route::has('login'))
                        <nav>
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="underline rounded-md px-3 py-2 ring-1 ring-transparent transition text-white hover:text-white/80 focus-visible:ring-white">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="underline rounded-md px-3 py-2 ring-1 ring-transparent transition text-white hover:text-white/80 focus-visible:ring-white">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="underline rounded-md px-3 py-2 ring-1 ring-transparent text-white hover:text-white/80 focus-visible:ring-white">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>
            </div>

            <footer class="absolute bottom-4 text-center text-sm text-white/70">
                &copy; {{ date('Y') }} {{ __('Casper Kizewski. All rights reserved.') }}
            </footer>
        </div>
    </div>
</body>
</html>
