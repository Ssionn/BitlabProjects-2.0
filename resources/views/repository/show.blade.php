<x-auth-layout title="{{ $repository->name }}">
    <div class="p-6">
        <div class="flex flex-col space-y-4">
            @if ($repository->archived == true)
                <div class="bg-yellow-500 w-full rounded p-4">
                    <div class="text-yellow-200">
                        {{ __('The owner archived this project! Be sure to check if there is a newer version of this repository.') }}
                    </div>
                </div>
            @endif
            <h1 class="font-semibold text-4xl">
                {{ auth()->user()->username }}/{{ $repository->name }} ({{ $repository->visibility }})
            </h1>
            <a href="{{ $repository->url }}" class="mt-2">
                <span class="text-xl inline-flex items-center">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="size-6 fill-white/50 mr-2">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 2C6.477 2 2 6.463 2 11.97c0 4.404 2.865 8.14 6.839 9.458.5.092.682-.216.682-.48 0-.236-.008-.864-.013-1.695-2.782.602-3.369-1.337-3.369-1.337-.454-1.151-1.11-1.458-1.11-1.458-.908-.618.069-.606.069-.606 1.003.07 1.531 1.027 1.531 1.027.892 1.524 2.341 1.084 2.91.828.092-.643.35-1.083.636-1.332-2.22-.251-4.555-1.107-4.555-4.927 0-1.088.39-1.979 1.029-2.675-.103-.252-.446-1.266.098-2.638 0 0 .84-.268 2.75 1.022A9.607 9.607 0 0 1 12 6.82c.85.004 1.705.114 2.504.336 1.909-1.29 2.747-1.022 2.747-1.022.546 1.372.202 2.386.1 2.638.64.696 1.028 1.587 1.028 2.675 0 3.83-2.339 4.673-4.566 4.92.359.307.678.915.678 1.846 0 1.332-.012 2.407-.012 2.734 0 .267.18.577.688.48 3.97-1.32 6.833-5.054 6.833-9.458C22 6.463 17.522 2 12 2Z">
                        </path>
                    </svg>
                    {{ __('Visit the repository on github') }}
                </span>
            </a>
        </div>

        <div class=" bg-[#121212] border-b border-gray-800 p-4 mt-4 rounded-t-lg">
            <div class="flex flex-row items-center justify-between px-8">
                <div class="">
                    <span class="font-bold text-xl">{{ $repository->default_branch }}</span>
                </div>
                <div class="">
                    <span class="font-bold text-xl">{{ substr($repository->commits->last()->hash, 0, 8) }}</span>
                </div>
            </div>
        </div>

        <div class="border-gray-600 bg-[#121212] rounded-lg">
            <ul class="p-4">
                @foreach ($repository->commits()->paginate(5) as $index => $commit)
                    <li class="ml-4 relative flex items-center py-4">
                        <div class="pl-4">
                            <div class="absolute w-3 h-3 bg-yellow-700 rounded-full left-0 top-3"></div>
                            <h3 class="text-lg font-medium">
                                {{ $commit->author }}
                            </h3>
                            <h3 class="text-lg font-medium">
                                {{ $commit->message }}
                            </h3>
                            <p class="text-sm text-gray-400">
                                {{ substr($commit->hash, 0, 8) }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-auth-layout>
