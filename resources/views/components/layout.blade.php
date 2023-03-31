@include('partials.head')

<main class="flex flex-col">
    <x-_nav/>
    <section class="w-full p-10 h-screen overflow-scroll sm:overflow-y-auto md:p-5 justify-center mt-14">
        {{ $slot }}
    </section>
</main>

<x-flash/>
