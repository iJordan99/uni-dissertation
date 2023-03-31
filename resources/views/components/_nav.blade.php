@php

    $active = 'text-yellow-300 text-white p-3 rounded-md font-medium';
    $default = 'text-white hover:text-yellow-400  p-3 rounded-md font-medium mt-2 ';

@endphp

{{--Navbar src: https://flowbite.com/docs/components/navbar/--}}
<nav class="border-gray-200 bg-blue-500 fixed top-0 w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
            <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? $active : $default }}" aria-current="page">Locations</a>
                </li>
                <li>
                    <a href="{{ route('items') }}" class="{{ request()->routeIs('items') ? $active : $default }}" aria-current="page">Items</a>
                </li>
                <li>
                    <a href="{{ route('alerts') }}" class="{{ request()->routeIs('alerts') ? $active : $default }}" aria-current="page">Alerts</a>
                </li>
            </ul>
        </div>
        <div class="ml-1 relative flex place-content-between">
            <p class="text-white pr-3 pt-0.5">{{ auth()->user()->username }}</p>
            <div x-data="{ open: false }">
                <button @click="open = ! open" type="button" class="bg-gray-800 flex rounded-full" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
{{--                                      img src: https://github.com/tailwindlabs/heroicons--}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6 bg-blue-500 justify-center hover:fill-blue-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </button>
                <div x-show="open" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 focus:bg-blue-500 hover:text-white" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                </div>
            </div>
        </div>
    </div>
</nav>






