<x-auth-layout title="Dashboard">
    <div class="p-4">
        <div class="w-full p-4 bg-yellow-500 rounded-md inline-flex items-center space-x-4 font-semibold">
            <span class="text-3xl">!</span>
            <span class="text-xl">It takes a while to fetch all projects. Make sure to refresh every so often!</span>
        </div>
        <div class="flex justify-end">
            <button id="dispatchButton" onclick="showToast()"
                class="px-4 py-2 bg-gradient-to-r from-indigo-600 to-blue-900 rounded mt-2">{{ __('Fetch Repositories') }}</button>
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

        <div id="toastBox" class="absolute bottom-8 right-8 flex items-end flex-col overflow-hidden p-5"></div>
    </div>
    <script>
        let toastBox = document.getElementById('toastBox');

        function showToast(message, success = true) {
            let toast = document.createElement('div');
            const baseClasses = [
                'w-96', 'h-16', 'font-semibold', 'm-4', 'shadow-lg', 'rounded',
                'flex', 'items-center', 'p-2', 'text-xl', 'justify-center'
            ];

            const successClasses = ['bg-[#343434]', 'text-green-300'];
            const errorClasses = ['bg-red-600', 'text-white'];

            toast.classList.add(...baseClasses);
            if (success) {
                toast.classList.add(...successClasses);
            } else {
                toast.classList.add(...errorClasses);
            }

            toast.innerHTML = message;
            toastBox.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 5000);
        }

        function dispatchJob() {
            fetch('{{ route('dispatch.job') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    const message = data.message || "Data is being fetched...";

                    showToast(message, true);
                })
                .catch((error) => {
                    console.error('Error:', error);
                    showToast('An error occurred while fetching data', false);
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const button = document.getElementById('dispatchButton');
            button.addEventListener('click', function() {
                dispatchJob();
            });
        });
    </script>
</x-auth-layout>
