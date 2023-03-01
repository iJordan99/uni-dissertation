<x-layout>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 m:py-24 lg:py-10 lg:max-w-none">
        <div class="bg-white rounded-lg h-32 px-4 py-2 flex flex-col">
            <div class="flex align-middle mt-4 h-10 flex-row">
                <h2 class="text-2xl text-gray-900 font-bold py-2">{{ $warehouse->name }}</h2>
                <a href="/warehouse/{{$warehouse->uuid}}/settings"
                   class="text-blue-500 bg-transparent
                        h-8 text-center font-bold cursor-pointer text-2xl mt-3 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </a>
            </div>
            <p class="text-gray-500">{{$warehouse->location}}</p>

        </div>

        <section class="px-2 py-2 mt-6 flex flex-row">
            <h2 class="text-xl text-gray-500 font-bold py-2">Storage Bins</h2>
            <div class="h-14 w-8 mt-1 ml-2">
                <a href="/warehouse/create/{{$warehouse->uuid}}"
                   class="text-blue-500 bg-transparent
                        h-8 text-center font-bold cursor-pointer text-2xl">+</a>
            </div>
        </section>

        <div class="lg:grid lg:grid-cols-4 rounded-lg gap-x-4 gap-y-4">
            @foreach ($warehouse->storageBins as $storageBin)
                <x-storage-bin-item :storage="$storageBin"></x-storage-bin-item>
            @endforeach
        </div>
    </main>
</x-layout>

