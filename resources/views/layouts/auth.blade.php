<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap" rel="stylesheet">

    <title>BitlabProjects 2.0</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="flex min-h-screen font-suse antialiased bg-black text-white/50">
    <x-navigation />

    <main class="flex-1 flex flex-col bg-black text-white/50">
        <div class="flex flex-col mb-4">
            <!-- Topbar -->
            <div
                class="flex flex-wrap justify-between items-center bg-[#121212] text-white/50 w-full h-16 px-4">
                @if (isset($title))
                    <span class="text-xl selection:text-gray-400 flex-grow min-w-0">{{ $title }}</span>
                @endif
                <div class="flex items-center space-x-1 cursor-pointer selection:text-gray-400" id="profileDropdownDiv"
                    data-dropdown-toggle="profileDropdown">
                    <div class="flex items-center space-x-2 min-w-0">
                        <img src="{{ auth()->user()->avatar_url }}" class="rounded-full h-7 w-7 flex-shrink-0" />
                        <span
                            class="text-lg whitespace-nowrap overflow-hidden text-ellipsis">{{ auth()->user()->username }}</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>

                <!-- Dropdown Menu -->
                <div id="profileDropdown"
                    class="z-10 hidden bg-[#121212] divide-y divide-gray-100 rounded-lg shadow w-40">
                    <ul class="py-2 text-sm text-gray-700 w-full" aria-labelledby="profileDropdownDiv">
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="block px-4 py-2 hover:text-white/50 w-full text-start text-md text-gray-400">
                                    {{ __('Sign out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{ $slot }}
    </main>
</body>
</html>

