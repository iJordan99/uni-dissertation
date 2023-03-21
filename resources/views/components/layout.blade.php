@include('partials.head')

<main class="flex">
    <x-_nav/>
    <section class="w-full p-10 h-screen overflow-scroll sm:overflow-y-auto md:p-5 justify-center">
        {{ $slot }}
    </section>
</main>

<x-flash/>
