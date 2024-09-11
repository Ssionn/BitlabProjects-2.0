 <!-- Sidebar -->
 <aside class="hidden sm:block w-72 min-h-screen selection:text-gray-500">
     <div class="bg-[#121212] rounded-br min-h-screen">
         <div class="flex justify-center p-4">
             <a href="{{ route('welcome') }}">
                 <span class="text-xl font-semibold">
                     {{ __('BitlabProjects') }}
                     <span
                         class="text-xl font-semibold bg-gradient-to-r from-indigo-600 to-blue-900 text-transparent bg-clip-text">{{ __('2.0') }}</span>
                 </span>
             </a>
         </div>

         <div class="mt-6">
             <div class="flex flex-col space-y-8 p-8">
                 <x-navlink :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                     {{ __('Dashboard') }}
                 </x-navlink>
                 <x-navlink :href="route('repositories')" :active="request()->routeIs('repositories')">
                     {{ __('Repositories') }}
                 </x-navlink>
             </div>
         </div>
     </div>
 </aside>

 <!-- Main Content Area -->
 <div class="flex-1 flex flex-col">

     <!-- Topbar -->
     <div
         class="flex justify-between items-center bg-[#121212] text-white/50 w-full h-16 border-b border-l border-gray-800 px-4">
         <span class="text-xl selection:text-gray-400">{{ ucfirst($currentRouteName) }}</span>
         <div class="inline-flex items-center space-x-1 cursor-pointer selection:text-gray-400" id="profileDropdownDiv"
             data-dropdown-toggle="profileDropdown">
             <div class="flex flex-row space-x-2">
                 <img src="{{ auth()->user()->avatar_url }}" class="rounded-full h-7 w-7" />
                 <span class="text-lg">
                     {{ auth()->user()->username }}
                 </span>
             </div>
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="size-4">
                 <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
             </svg>
         </div>

         <div id="profileDropdown" class="z-10 hidden bg-[#121212] divide-y divide-gray-100 rounded-lg shadow w-40">
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
