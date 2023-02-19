<x-layout>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 m:py-24 lg:py-10 lg:max-w-none">
        <div class="bg-white rounded-lg h-32 px-4 py-2 flex flex-col">
            <div class="flex align-middle mt-4 h-10">
                <h2 class="text-2xl text-gray-800 font-bold py-2">{{ $warehouse->name }}</h2>
            </div>
            <p class="text-gray-500">{{$warehouse->location}}</p>
        </div>

        <section class="bg-white rounded-lg px-4 py-2  mt-6">
            <h2 class="text-xl text-gray-500 font-bold py-2">Storage Bins</h2>
            <div>{{ $warehouse->storageBins }}</div>
{{--            <div class="flex-row align-middle mt-4 h-10 w-full">--}}
{{--                <button class="bg-blue-400 text-white rounded-md text-sm align-middle w-1/12 text-center" aria-current="page">--}}
{{--                    Details--}}
{{--                </button>--}}
{{--                <button class="bg-blue-400 text-white rounded-md text-sm align-middle w-1/12  text-center" aria-current="page">--}}
{{--                    Stock--}}
{{--                </button>--}}
{{--            </div>--}}

        </section>
    </main>

</x-layout>
