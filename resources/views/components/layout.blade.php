    @include('partials.head')

    <main class="grid grid-cols-5">
      <x-_nav/>
      <section class="h-screen col-span-4 bg-blue-100 overflow-scroll sm:overflow-y-auto sm:max-h-screen">
        {{ $slot }}
      </section>
    </main>

<x-flash/>
