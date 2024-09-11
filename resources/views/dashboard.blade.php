<x-auth-layout>
    <div class="w-full p-4 bg-yellow-500 rounded-md inline-flex items-center space-x-4 font-semibold">
        <span class="text-3xl">!</span>
        <span class="text-xl">It takes a while to fetch all projects. Make sure to refresh every so often!</span>
    </div>
    <div class="flex flex-col space-y-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-8 mt-4">
        <div class="bg-[#121212] p-4 rounded">
            <h1 class="text-center text-2xl font-semibold">{{ __('Total repositories') }}</h1>
            <div class="mt-6">
                <h2 class="text-2xl font-semibold text-center">
                    {{ count($repositories) }}
                </h2>
            </div>
        </div>
        <div class="bg-[#121212] p-4 rounded">
            <h1 class="text-center text-2xl font-semibold">{{ __('Listed issues') }}</h1>
            <div class="mt-6">
                <h2 class="text-2xl font-semibold text-center">
                    {{ count($issues) }}
                </h2>
            </div>
        </div>
        <div class="bg-[#121212] p-4 rounded">
            <h1 class="text-center text-2xl font-semibold">{{ __('Total Commits') }}</h1>
            <div class="mt-6">
                <h2 class="text-2xl font-semibold text-center">
                    {{ count($commits) }}
                </h2>
            </div>
        </div>
    </div>
</x-auth-layout>
