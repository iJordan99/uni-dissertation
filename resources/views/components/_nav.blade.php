<nav class="bg-gray-800 w-100 h-screen py-12 px-8 flex flex-col justify-center">
  <div class="flex-shrink-0 flex items-center ">
    <h1 class="font-bold text-2xl text-white">StockManager</h1>
  </div>

  <div class="sm:block pt-5">
    <div class="flex flex-col">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="bg-gray-900 text-white py-2 rounded-md text-sm font-medium pl-3" aria-current="page">Dashboard</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white py-3 rounded-md text-sm font-medium pl-3">PlaceHolder</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white py-3 rounded-md text-sm font-medium pl-3">PlaceHolder</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white py-3 rounded-md text-sm font-medium pl-3">Settings</a>
      
      <div class="ml-1 relative mt-10 flex pr-3 place-content-between">
        <p class="text-white p-2 text-sm">Jordan S</p>
        <div x-data="{ open: false }">
          <button @click="open = ! open" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
          </button>
            <div x-show="open" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-700 focus:bg-gray-700 hover:text-white" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-700 focus:bg-gray-700 hover:text-white" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-700 focus:bg-gray-700 hover:text-white" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            </div>
        </div>
      </div>
  </div>
</nav>

  