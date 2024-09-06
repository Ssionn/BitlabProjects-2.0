<x-guest-layout>

    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="w-full max-w-md selection:text-white">
            <span class="flex justify-center items-center text-3xl font-semibold">
                {{ __('BitlabProjects') }}
                <span
                    class="ml-2 bg-gradient-to-r from-indigo-600 to-blue-900 text-transparent bg-clip-text">{{ __('2.0') }}</span>
            </span>

            <div class="mt-6">
                <div class="border-2 border-white rounded-lg">
                    <form action="{{ route('register.post') }}" method="post" class="flex flex-col space-y-4 p-6">
                        @csrf

                        <label for="name" class="text-lg">{{ __('Name') }}</label>
                        <input name="name" type="text"
                            class="appearance-none rounded w-full py-2 px-3 text-black" />

                        <label for="username" class="text-lg">{{ __('Username') }}</label>
                        <input name="username" type="text"
                            class="appearance-none rounded w-full py-2 px-3 text-black" />

                        <label for="email" class="text-lg">{{ __('Email') }}</label>
                        <input name="email" type="email"
                            class="appearance-none rounded w-full py-2 px-3 text-black" />

                        <label for="password" class="text-lg">{{ __('Password') }}</label>
                        <input name="password" type="password"
                            class="appearance-none rounded w-full py-2 px-3 text-black" />

                        <label for="password_confirmation" class="text-lg">{{ __('Confirm password') }}</label>
                        <input name="password_confirmation" type="password"
                            class="appearance-none rounded w-full py-2 px-3 text-black" />

                        <div class="flex justify-end">
                            <a href="{{ route('login') }}" class="underline">
                                {{ __('Already have an account?') }}
                            </a>
                        </div>

                        <button type="submit" class="border-2 border-indigo-700 py-2 px-3 rounded hover:bg-indigo-700">
                            {{ __('Log in') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
