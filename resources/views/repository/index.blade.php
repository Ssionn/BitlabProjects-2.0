<x-auth-layout title="Repositories">
    <div class="p-4">
        @foreach ($repositories as $repository)
            <a href="{{ route('repositories.show', $repository->id) }}">
                <div class="flex flex-col mt-4 bg-[#121212] w-full text-white/50 rounded p-4">
                    <div class="inline-flex justify-between items-center w-full">
                        <span class="font-bold text-lg">
                            @if ($repository->name === auth()->user()->username)
                                {{ $repository->readMe() }}
                            @else
                                {{ $repository->name }}
                            @endif
                        </span>
                        <span>
                            {{ $repository->lastUpdatedAtFormatted() }}
                        </span>
                    </div>

                    <div class="flex flex-col">
                        <div class="inline-flex justify-between items-center">
                            <span class="font-semibold text-md">{{ $repository->default_branch }}</span>
                            <span class="font-semibold text-md">{{ $repository->owner }}</span>
                        </div>
                        <div class="inline-flex justify-between items-center">
                            <span class="font-semibold text-sm">{{ $repository->visibility }}</span>
                            <span class="font-semibold text-sm">Commits: {{ $repository->commits()->count() }}</span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

        <div class="mt-4">
            {{ $repositories->links() }}
        </div>
    </div>
</x-auth-layout>
