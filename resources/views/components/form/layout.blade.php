<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 m:py-24 lg:py-10 lg:max-w-none">
    <div class="bg-white rounded-lg h-fit px-4 py-2 flex flex-col">
        <div class="flex align-middle mt-4 h-10 mb-4">
            <div class="flex align-middle mt-4 h-10">
                <h2 class="text-xl font-bold py-2 text-gray-700 px-1">{{ $title }}</h2>
            </div>
        </div>
        <form action="{{ $action }}" method="POST">
            @csrf
            {{ $slot }}
        </form>
    </div>
</main>
