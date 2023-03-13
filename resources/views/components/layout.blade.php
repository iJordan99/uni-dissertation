    @include('partials.head')

    <main class="grid grid-cols-5">
      <x-_nav/>
      <section class="h-screen col-span-4 bg-blue-100 overflow-scroll sm:overflow-y-auto sm:max-h-screen">
          <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 m:py-24 lg:py-10 lg:max-w-none">
            {{ $slot }}
          </main>
      </section>
    </main>

<x-flash/>
