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
                    <form action="{{ route('login.post') }}" method="post" class="flex flex-col space-y-4 p-6">
                        @csrf

                        <label for="email" class="text-lg">{{ __('Email') }}</label>
                        <input name="email" type="email" id="email"
                            class="appearance-none rounded w-full py-2 px-3 text-black" />

                        @if(session('login_error'))
                            <span class="block sm:inline text-red-500">{{ session('login_error') }}</span>
                        @endif

                        <label for="password" class="text-lg">{{ __('Password') }}</label>
                        <input name="password" type="password" id="password"
                            class="appearance-none rounded w-full py-2 px-3 text-black" />

                        <div class="flex justify-between">
                            <a href="{{ route('register') }}" class="underline">
                                {{ __('Don\'t have an account?') }}
                            </a>

                            <a href="#" class="underline">
                                {{ __('Forgot your password?') }}
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
