<nav class="bg-blue-500 w-100 h-screen py-12 px-8 flex flex-col justify-center">
  <div class="flex-shrink-0 flex items-center ">
    <h1 class="font-bold text-2xl text-white">StockManager</h1>
  </div>

  <div class="sm:block pt-5">
    <div class="flex flex-col">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="/" class="bg-blue-400 text-white py-3 rounded-md text-sm font-medium pl-3" aria-current="page">Locations</a>

      <a href="#" class="text-white hover:bg-blue-400 hover:text-white py-3 rounded-md text-sm font-medium mt-2 pl-3">PlaceHolder</a>

      <a href="#" class="text-white hover:bg-blue-400 hover:text-white py-3 rounded-md text-sm font-medium mt-2 pl-3">PlaceHolder</a>

      <a href="#" class="text-white hover:bg-blue-400 hover:text-white py-3 rounded-md text-sm font-medium mt-2 pl-3">Settings</a>

      <div class="ml-1 relative mt-10 flex pr-3 place-content-between">
        <p class="text-white text-sm">Jordan S</p>
        <div x-data="{ open: false }">
          <button @click="open = ! open" type="button" class="bg-gray-800 flex text-sm rounded-full" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>
{{--              img src: https://github.com/tailwindlabs/heroicons --}}
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6 bg-blue-500 justify-center hover:fill-blue-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>
          </button>
            <div x-show="open" class="mr-4 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 focus:bg-blue-500 hover:text-white" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 focus:bg-blue-500 hover:text-white" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 focus:bg-blue-500 hover:text-white" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</nav>

