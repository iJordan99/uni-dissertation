<x-layout>
    <div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-10 lg:max-w-none">
                <div class="bg-white rounded-lg h-32 px-4 py-2 flex flex-col">
                    <h2 class="text-2xl text-gray-800 font-bold py-2">Locations</h2>
                    {{-- https://iconscout.com/icon/add-insert-plus-new-tag --}}
{{--                    <button type="button" class="flex justify-center text-gray-400 hover:text-gray-600 text-3xl">--}}
{{--                        +--}}
{{--                    </button>--}}
                    <div class="relative flex lg:inline-flex items-center border-b-2 h-10">
                        <form method="GET" action="#" class="w-full">
{{--                            @if (request('category'))--}}
{{--                                <input type="hidden" name="category" value="{{ request('category') }}">--}}
{{--                            @endif--}}

                            <input  type="text"
                                    name="search"
                                    placeholder="Find storage name..."
                                    class="bg-transparent placeholder-grey font-semibold text-sm w-96 w-full"
                                    value="{{ request('search') }}">
                        </form>
                    </div>
                </div>
                <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
                    @foreach ($warehouses as $warehouse)
                        <x-warehouse-item :warehouse="$warehouse"></x-warehouse-item>
					@endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layout>
