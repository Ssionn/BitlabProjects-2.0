<!-- Sidebar -->
<aside class="hidden sm:block w-72 min-h-screen selection:text-gray-500">
    <div class="flex flex-col justify-between bg-[#121212] min-h-screen">
        <!-- Top content -->
        <div>
            <div class="flex flex-col justify-center items-center space-y-2 p-4">
                <a href="{{ route('welcome') }}">
                    <span class="text-xl font-semibold">
                        {{ __('BitlabProjects') }}
                        <span class="text-xl font-semibold bg-gradient-to-r from-indigo-600 to-blue-900 text-transparent bg-clip-text">
                            {{ __('2.0') }}
                        </span>
                    </span>
                </a>
                <span class="rounded-full py-1 px-2 bg-gradient-to-r from-indigo-600 to-blue-900">{{ __('Pre-Alpha') }}</span>
            </div>

            <div class="mt-6">
                <div class="flex flex-col space-y-8 p-8">
                    <x-navlink :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex flex-row items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        {{ __('Dashboard') }}
                    </x-navlink>
                    <x-navlink :href="route('repositories')" :active="request()->routeIs('repositories')" class="flex flex-row items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                        {{ __('Repositories') }}
                    </x-navlink>
                </div>
            </div>
        </div>

        <div class="p-4">
            {{-- Nav link or other footer content --}}
        </div>
    </div>
</aside>
